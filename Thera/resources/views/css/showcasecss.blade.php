<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;1,300&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}


.title{
    color: black
}
.container h2{
    text-align: center;
    text-transform: uppercase;
    font-size: 35px;
    margin-bottom: 25px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.container .services{
    justify-content: space-around;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    left: 300px;
}

.container .services .card{
    width: 330px;
    text-align: center;
    background: #51B74F;
    padding: 20px 15px;
    margin-bottom: 30px;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s;
}

.container .services .card:hover{
    background: chocolate;
}

.container .services .card .content{
    transition: 0.3s;
}

.container .services .card:hover .content{
    transform: scale(1.07);
}

.container .services .card .content .icon{
    padding: 5px 0;
    color: white;
}

.container .services .card .content .icon i{
    font-size: 40px;
}

.container .services .card:hover .content .title{
    color: white;
}

.container .services .card .content .title{
    padding: 5px 0;
    font-size: 24px;
    font-weight: 500;
    color: chocolate;
    transition: 0.3s;
}

p{
    color: white;
}

.title{
    color: black
}
</style>