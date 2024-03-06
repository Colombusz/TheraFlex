<?php

namespace App\Http\Controllers;
use App\Models\Payroll;
use App\Models\Benefit;
use App\Models\Employee;
use Illuminate\Http\Request;
use DB;
use File;
class PayrollController extends Controller
{
    public function index($id)
    {
        // dd($id);
        $query = DB::table('payrolls')
            ->join('benefits', 'payrolls.id', '=', 'benefits.payroll_id')
            ->select('payrolls.id','payrolls.workedHours', 'payrolls.payRate','payrolls.grossIncome','payrolls.netIncome','benefits.Total')
            ->where('employee_id', '=', $id)
            ->get();
            // dd($query);
            return view('payrolls.index', ['query'=>$query]);
    }

    public function create()
    {
        return view('payrolls.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'WorkedHours'=> 'required|numeric',
            'PayRate'=> 'required|numeric',
         ]);

         $totalwh = $data['WorkedHours'];
         $perhr = $data['PayRate'];

         if( $totalwh > 160)
         {
            $OT = $totalwh - 160;
            $totalwh = 160;

            $OTpay = ($OT * ($perhr*1.5));

            $gross = ($totalwh * $perhr) + $OTpay;
         }
         else
         {
            $OT = 0;
            $gross = ($totalwh * $perhr);
         }


        //  calculating taxrate
         if($gross > 0 && $gross <= 250000)
         {
            $taxrate = 0;
         }
         elseif($gross > 25000 && $gross <= 400000)
         {
            $taxrate = 0.15;
         }
         elseif($gross > 400000 && $gross <= 800000)
         {
            $taxrate = 0.2;
         }
         elseif($gross > 800000 && $gross <= 2000000)
         {
            $taxrate = 0.25;
         }
         elseif($gross > 2000000 && $gross <= 8000000)
         {
            $taxrate = 0.3;
         }
         elseif($gross > 8000000 )
         {
            $taxrate = 0.35;
         }
        //  income tax
         $incomeTax = $taxrate * $gross;

        //  sss contributions
         $sss = 0.045 * $gross;

         if($sss > 900)
         {
            $sss = 900;
         }

        //  philhealth contribution
         $philHealth = $gross * 0.04;

         if($gross > 1500)
         {
            $pagIbig = $gross * 0.02;
         }
         else{
            $pagIbig = $gross * 0.01;
         }

         $netIncome = $gross - ($pagIbig + $philHealth + $incomeTax + $sss);
         $totalDed = $pagIbig + $philHealth + $incomeTax + $sss;
        //  dd($incomeTax);


        $payroll = Payroll::create([
            'workedHours' => $totalwh,
            'payRate' => $perhr,
            'overTimeWorkedHours' => $OT,
            'grossIncome' => $gross,
            'netIncome' => $netIncome,
            'employee_id' => '2'
         ]);
         $wewe = new Benefit([
            'sss' => $sss,
            'pagIbig'=> $pagIbig,
            'philHealth' => $philHealth,
            'incomeTax' => $incomeTax,
            'total'=> $totalDed
         ]);
         $employee = Employee::find(2);
        //  dd($benefit);
         $payroll->benefits()->save($wewe);
        //  $employee->payrolls()->save();

    }
}
