
@extends('layouts.Etudiant')



@section('content')
<!--<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #404E67;
    background: #F5F7FA;
    font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
   
}

table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table  td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr href="{{Route("admin.store")}}">' +
            '<td><input type="text" class="form-control" name="nom" id="nom"></td>' +
            '<td><input type="text" class="form-control" name="prenom" id="prenom"></td>' +
            '<td><input type="date" class="form-control" name="DateNaissance" id="DateNaissance"></td>' +
            '<td><input type="text" class="form-control" name="filiere" id="filiere"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
            '<td><input type="text" class="form-control" name="email" id="email"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});
</script>
</head>
<body>
<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Employee <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>nom</th>
                        <th>prenom</th>
                        <th>Date de Naissance</th>
                        <th>filiere</th>
                        <th>telephone</th>
                        <th>email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants  as $etudiant)
                    <tr>
                        <td>{{$etudiant->nom}}</td>
                        <td>{{$etudiant->prenom}}</td>
                        <td>{{$etudiant->DateNaissance}}</td>
                        <td>{{$etudiant->filiere}}</td>
                        <td>{{$etudiant->telephone}}</td>
                        <td style="width: 300px;">{{$etudiant->email}}</td>
                        <td>
                            <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    
                    
                    
                    </tr>  
                    @endforeach    
                </tbody>
            </table>
        </div>
    </div>
</div>     
</body>
</html>-->


<head>

<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&family=Ubuntu&display=swap" rel="stylesheet">

<meta name="viewport" content="width=device-width, initial-scale-1.0" charset="UTF-8">
<title>Responsive Admin Dashboard | Redesign</title> 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      
      function drawChart() {


        var data = google.visualization.arrayToDataTable([
          ['Filieres', ''],
          ['GI',    3],
          ['GE',      4],
          ['IID',  2],
          ['GPEE',  2],
        ]);      

        var options = {
      title: '',  
      colors: ['#72A0C1','#318CE7','#03DAC6','#018786'],  
      'backgroundColor': 'transparent',
        height: 400,
        width: 350,
        pieHole: 0.8,
        showLables: 'true',
        pieSliceTextStyle: {
            color: 'white',
            fontSize:0.5
        },
        legend: {
            position: 'right',
            alignment: 'center',
            textStyle: {fontSize: 14}
        },
        chartArea: { 
            left: 20, 
            top: 10, 
            width: '130%', 
            height: '130%'
        },
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
      }
    </script>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  
  function drawChart() {


    var data = google.visualization.arrayToDataTable([
      ['Année', ''],
      ['1ère ', 3],
      ['2ème', 3],
      ['3ème',  5],
      ['4ème',  5],
      ['5ème',  5]
    ]);      

    var options = {
      title: '',  
      colors: ['#146C94','#ACBCFF','#1D267D','#5C469C','#5C469C'], 
      'backgroundColor': 'transparent', 
        height: 400,
        width: 350,
        pieHole: 0.8,
        showLables: 'true',
        pieSliceTextStyle: {
            color: 'white',
            fontSize:0.5
        },
        legend: {
            position: 'right',
            alignment: 'center',
            textStyle: {fontSize: 14}
        },
        chartArea: { 
            left: 10, 
            top: 10, 
            width: '130%', 
            height: '130%'
        },
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

    chart.draw(data, options);
  }
</script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Teko:wght@300&family=Ubuntu&display=swap');


*{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Ubuntu', sans-serif;};

:root
{
--blue:#287bff;
--white:#fff;
--grey:#f5f5f5;
--black1:#222;
--black2:#999;
}








body{
min-height: 100vh;
overflow-x: hidden;}

.container{
position: relative;
width: 140%;
margin-bottom:10px;

}

.cardBox{
    position:relative;
      top:50px;
      left:280px;
      width: 80%;
      padding: 0px 30px 30px 30px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap:30px;
      
    }
   
.card {
background-color: rgb(255, 255, 255);
height: 110%;
padding: 10px;
border-radius: 20px;
display: flex;
justify-content: space-between;
box-shadow: 0 7px 25px rgba(0, 0,0, 0.08);
}
.cardBox .card .numbers{
position: relative; 
font-weight: 500; 
font-size: 2.2em; 
color: #287bff;
}
.cardBox .card .cardName{
color: #999;
font-size: 1em; 
margin-top: 5px;}
.cardBox .card .iconBox{
font-size: 3.2em;
 color: #999;
}
.cardBox .card:hover{
background: #287bff;}

.cardBox .card:hover .numbers,
.cardBox .card:hover .cardName, 
.cardBox .card:hover .iconBox {
color: white;}


.details
{
position: relative;
top: 80px;
left:310px; 
width: 85%;
padding: 1px;
display: grid;
grid-template-columns: 2fr 1fr ;
grid-gap: 30px;
}

.details .Benefeciare{
   
position: relative;
display: grid; 
min-height: 380px;
background: white;
padding: 20px;
box-shadow: 0 7px 25px rgba(0,0,0,0.08);
border-radius: 20px;
}

.cardheader{
display: flex;
justify-content: space-between;
align-items: flex-start;
}

.cardheaderP {
   display: flex;
   justify-content:space-between;
  
}
.icon_add {
    font-size: 1em;
}
.cardheaderP h2{
    font-weight: 500;
    color: #287bff;}
    

.cardheader h2{
font-weight: 600;
color: #287bff;}

.btn{
position: relative;
padding: 5px 10px;
background: #287bff;
text-decoration: none;
color: white;
border-radius: 6px;
height:40px;
margin-left:10px;
}

.details table{
width: 100%;
border-collapse: collapse;
margin-top: 10px;
}
.details table thead td{
font-weight: 600 ;}

.details .Benefeciare table tr{
color: black;
border-bottom: 1px solid rgba(0, 0,0, 0.1);
} 
.details .Benefeciare table tbody tr:last-child{
    border-bottom: none;
    } 



.details .Benefeciare table tbody tr:hover{
background: #287bff;
color: white;}

 .Bloquericon:hover{
    background: #287bff;
    color: white;}


.details .Benefeciare table tr td{
  padding: 10px;
    } 

.details .Benefeciare table tr td:last-child
{text-align: center;}

.details .Benefeciare table tr td:nth-child(2)
{text-align: end;}

.details .Benefeciare table tr td:nth-child(3){
text-align: center;
}
.details .Benefeciare table tr td:nth-child(4){
    text-align: start;
    }


.orphelin{
padding: 2px 4px;
background: #3c17f4d2;
color: white; 
border-radius: 4px; 
font-size: 14px; 
font-weight: 500;
}
.handicape{
    padding: 2px 4px;
    background: #67069e6e;
    color: white; 
    border-radius: 4px; 
    font-size: 14px; 
    font-weight: 500;
    }
.homeless{
        padding: 2px 4px;
        background: #0b87a96e;
        color: white; 
        border-radius: 4px; 
        font-size: 14px; 
        font-weight: 500;
        }
.veuve
      {
        padding: 2px 4px;
        background: #55d0f1ae;
        color: white; 
        border-radius: 4px; 
        font-size: 14px; 
        font-weight: 500;
            }
 
 .Bloquericon{
            font-size: 1.3em; 
            color: transparent;
        }


.graphBox{
position: relative;
left: 300px;
top:50px;
width: 78%;
padding: 20px; 
display: grid;
grid-template-columns: 1fr 1fr;
grid-gap: 20px;
min-height: 300px;

}
.box{
    background-color: #fff;
    box-shadow: 0 7px 25px rgba(0,0,0,0.08);
    border-radius: 20px;
    
}


.navigation{
position: fixed;
width: 280px;
height: 100%;
background-color:#287bff;
border-left: 10px solid #287bff;
transition: 0.5s; 
overflow: hidden;
}



.navigation ul {
    position: absolute;
    top: 280px;
    left: 0;
    width: 100%;
    list-style: none;
    }
    
.navigation ul li:hover{
    background: white;
    }

  
    
.navigation ul li{
position: relative;
width: 100%;
list-style:none;
border-top-Left-radius:30px;
border-bottom-Left-radius:30px;
}
.navigation ul li .Id{
    position: relative; 
    font-weight: 500; 
    font-size: 2.2em; 
    color: #287bff;
    }

.navigation ul li .titre{
        color: #999;
        font-size: 1em; 
        margin-top: 5px;}



.navigation ul li:nth-child(1){
margin-top: 40px;
margin-bottom: 50px;
background-color: #ffffff;
width: 100%;
height: 160px;
padding: 10px;
display: flex;
justify-content: space-between;
box-shadow: 0 7px 25px rgba(0, 0,0, 0.08);
border-top-Left-radius:20px;
border-bottom-Left-radius:20px;
}
.navigation ul li:nth-child(1) .iconBox{
    font-size: 3.2em;
    color: #999;
    }

.navigation ul li:nth-child(1)::before
    {
    content:'';
    position: absolute;
    right: 0;
    top: -50px;
    width: 50px;
    height: 50px;
     border-radius: 45%;
    box-shadow: 33px 33px 0 10px white;
    pointer-events: none;
    }

.navigation ul li:nth-child(1)::after
{
content:'';
position: absolute;
right: 0;
bottom: -50px;
width: 50px;
height: 50px;
border-radius: 45%;
box-shadow: 35px -35px 0 10px white;
pointer-events: none;
}

.navigation ul li:nth-child(2) a{
position: relative;
display: block;
width: 100%;
display: flex;
text-decoration: none;
color: white;
}
.navigation ul li:nth-child(2):hover a
 {
    color: #287bff;
}
.navigation ul li:nth-child(2) a .icon{
position: relative;
display: block; 
min-width: 60px;
height: 60px;
Line-height: 60px;
text-align: center;
font-size: 1.8em;
}
.navigation ul li:nth-child(2) a .title { 
position: relative;
display: block;
padding: 0 11px;
height: 40px;
Line-height: 47px;
}
.navigation ul li:nth-child(2):hover a::before
{
content:'';
position: absolute;
right: 0;
top: -50px;
width: 50px;
height: 50px;
 border-radius: 45%;
box-shadow: 33px 33px 0 10px white;
pointer-events: none;
}


.navigation ul li:nth-child(2):hover a::after
{
content:'';
position: absolute;
right: 0;
bottom: -50px;
width: 50px;
height: 50px;
border-radius: 45%;
box-shadow: 35px -35px 0 10px white;
pointer-events: none;
}

.Add_Benefeciare{
position: relative;
right: 40;
padding-top: 10px;

padding-right: 5px;
min-height: 500px;
width: 100%;
background-color: #fff;
box-shadow: 0 7px 25px rgba(0,0,0,0.08);
border-radius: 20px;
justify-items: center;
display: grid;
}
.form{
    height: 85%;
   display: grid;
   margin-top: 40px;
   font-size:0.9em;
   width: 60%;
   margin-left: 15%;
   
  
  }
    input[type=text] {
        border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        border-bottom-style: groove;
        border-bottom-color: #287bff;
      }

  input[type=text]:focus {
    outline: none;
  }



 
 

  
  input[type="checkbox"]::before {
    content: "";
    width: 1em;
    height: 1em;
    transform: scale(0);
    transition: 120ms transform ease-in-out;
    box-shadow: inset 1em 1em #287bff;
  }
  
  input[type="checkbox"]:checked::before {
    transform: scale(1);
  }

  .Button{
    padding: 2px 4px;
    background: #287bff;
    color: white; 
    border: none;
    border-radius: 4px; 
    font-size: 14px; 
    font-weight: 500;
    width:100%;
    }
  





    .table2 {
        margin-top: 10px;
        margin: 2%;
        background: #ffffff;
        border-collapse: collapse;
        width: 100%;
        
      }
      .table2 th {
        border-bottom: 1px solid #364043;
        color: #E2B842;
        font-size: 0.85em;
        font-weight: 600;
        padding: 0.5em 1em;
        text-align: left;
      }
      .table2 {
        color: rgb(0, 0, 0);
        font-weight: 400;
        padding: 0.65em 1em;
      }
      .table2 .disabled td {
        color: #4F5F64;
      }
      .table2 tbody tr {
        transition: background 0.25s ease;
      }
      .table2 tbody tr:hover {
        background: #014055;
      }
      

    
</style>










</head>



<body>


<div class="container">
    <div class="navigation">
   
        
          


<div>
 <ul>

<li>
    <div class="Identity">
       
         <div ><ion-icon class="iconBox" name="person-circle-outline"></ion-icon> <div class="Id">Administrateur</span></div>
   
        <div class="titre" ></div>
    </div>
</li>
<li>
    <a href="{{ route('logout') }}">
    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
    <span class="title">Déconnexion</span>
    </a>
</li>

</ul>
</div>


</div>
<!-- cards -->
  <div class="cardBox"> 
     <div class="card"> 
     <div>
     <div class="numbers">{{$etudiant_count}}</div> 
     <div class="cardName" >ETUDIANTS</div>
    </div>
    <div class="iconBox"><!--<ion-icon name="wallet-outline"></ion-icon>--><ion-icon name="people-outline"></ion-icon></div> 
    </div>
    
    <div class="card"> 
        <div>
        <div class="numbers">{{$filiere_count}}</div> 
        <div class="cardName" >FILIERES</div>
        </div>
        <div class="iconBox"><ion-icon name="calendar-outline"></ion-icon></div> 
        </div>
    
  
    <div class="card"> 
        <div>
        <div class="numbers">{{$departement_count}}</div> 
        <div class="cardName" >DEPARTEMENTS</div>
        </div>
        <div class="iconBox"></div> 
        </div>
    
    </div>

   
   <div class="graphBox">
        
        <div class="box"><div  class="" id="piechart" ></div></div>
        <div class="box"><div  class="" id="piechart1" ></div></div>
     
    </div>
    
    <div class="details">

    <div class="Benefeciare">
     <div class="cardheader"> 
     <h2>les etudiants</h2>
     <form action="{{route('admin.pdfGenerator')}}" method="GET">
       @csrf
								
        <a href="{{route('admin.pdfGenerator')}}" class="btn">imprimer</a>
     </form>
      <!--<form action="{{route('admin.pdfGenerator')}}"  >
       <input type="submit" value="imprimer" name="imp" class="btn">
    </form>-->
    </div> 
     
     @if($message = Session::get('success'))

    <div class="alert alert-success">
        {{ $message }}
    </div>

    @endif
    <table>
    <thead>
    <tr>
    <td>Nom</td> 
    <td>prenom</td> 
    <td>email</td> 
    <td >Date da naissance</td>
    <td >filiere</td>
    <td >option</td>
    </tr> 
    </thead> 
   
    <tbody>
    @if(count($donnees) > 0)
    @foreach ($donnees as $donnee)
            <tr>
                <td>{{ $donnee->nom }}</td>
                <td>{{ $donnee->prenom }}</td>
                <td>{{ $donnee->email }}</td>
                <td>{{ $donnee->DateNaissance }}</td>
                
                <td><span class="status veuve">{{ $donnee->filiere }}</span></td>
                <td>
							<form method="post" action="{{ route('admin.destroy',$donnee->id) }}" style="">
								@csrf
								@method('DELETE')
								<a href="{{ route('admin.show', $donnee->id) }}" class="btn btn-primary btn-sm" style="margin-bottom:10px;">View</a>
								<a href="{{ route('admin.edit', $donnee->id) }}" class="btn btn-warning btn-sm" style="margin-bottom:10px;">Edit</a>
								<input type="submit" class="btn btn-danger btn-sm" value="Delete" style="margin-bottom:10px;" />
							</form>
							
						</td>
               
            </tr>
                @endforeach
                @else
                   <tr>
                      <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                @endif
    
       </tbody>
      </table>
       </div> 
       <div class="Add_Benefeciare">
         <div class="cardheaderP"> 
            <h2>Ajouter Etudiant</h2>
            </div> 
            <form action="{{ route('admin.store') }}" method="POST">
            @csrf
			
                <div class="input NOM">
                <label for="Nom">Nom :</label>
                <input type="text"  id="Nom" name="admin_nom" required>
                </div>
                <div class="input NOM">
                <label for="Nom">prenom :</label>
                <input type="text"  id="Nom" name="admin_prenom" required>
                </div>
                <div class="input Quartier">
                <label >email: </label>
                <input type="text" id="Quartier" name="admin_email" required >
                </div>
                <div class="input NOM">
                <label for="Nom">filiere :</label>
                <input type="text"  id="Nom" name="admin_filiere" required>
                </div>
                <div class="input Ville">
                <label >telephone :</label>
                <input type="text"   id="Ville" name="admin_telephone" required>
                </div>
                <div class="input Ville">
                <label >password :</label>
                <input type="password"   id="Ville" name="admin_pass" required>
                </div>
                <div class="input Age">
                <label for="naissance">Date naissance</label>
                <input type="date" id="start" name="admin_DateNaissance"
                value="2022-12-16" max="2021-12-16">
                </div>
                
                <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Add" />
			    </div>
            </form>
        </div>

    </div>
        










</div> 



<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body> 
</html>
@endsection
