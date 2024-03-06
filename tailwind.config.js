/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        backgroundColor: {
          'customcolor1': '#AA8B56',
          'customcolor2':'#69a418',
          'customcolor3': '#51B74F',
          'customformcolor-1':'#D3D3D3',
          'customcolor4': '#79AC78',
          'customcolor5': '#445C3C',
          'customcolor6': '#ACFFAD',
          'customcolor7': '#9ADE7B',
          'customcolor8': '#374148',
          'customcolor9': '#FAC898',
        },
        colors:{
          'gayish-blue':'#374148',
        },
        inset: {
          '0': 0,
          // ...
         '85': ' top: 250px',
         '1/5': '20%',
        },
        spacing: {
          '90': '90%', // Custom inset value

        },
        letterSpacing: {
          tightest: '-.075em',
          tighter: '-.05em',
          tight: '-.025em',
          normal: '0',
          wide: '.025em',
          wider: '.05em',
          widest: '.1em',
          extraWidest: '.25em',
        backgroundImage:{
          'massage-image':"url(/images/massage.jpg)",
        }
      },
    },
    plugins: [],
  }

  }
