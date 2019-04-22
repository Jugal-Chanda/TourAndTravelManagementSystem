var tourist_place_cost_sort = 0;
var pakage_cost_sort = 0;

function contant_index(id) {
	var ids = ["galary","toursit_place","hotel","invoice_hotel","pakage_catagory","profile","travel_req","dashbord"];
	for (var i = 0;i< ids.length;i++) {
		document.getElementById(ids[i]).style.display = "none";
	}
	document.getElementById(id).style.display = "block";
	if(id == 'galary'){
		$('#Galary_body').load('galary.php');
	}else if(id == 'hotel' ){
		$('#hotel_body').load('hotel.php');		
	}else if(id == 'toursit_place'){
    $('#tourist_place_body').load('toursit_place.php');
  }else if(id == 'pakage_catagory'){    
    $('#pakage_catagory_body').load('pakage_catagory.php');
  }else if(id == 'profile'){
    var x = profile();
    if (x==0) {
      window.location = "http://localhost/project/ttm3/admin/login.php";
    }
    else{

    }
  }
  else if(id=='travel_req'){
    $('#travel_req_body').load('travel_request.php');
  }
  else if(id == "dashbord"){
    
    $('#user_information').load('php/user_information_dashbord.php');
    $('#place_information').load('php/place_information_deshbord.php');
  }
}


function profile_image_upload(){
  alert("call");
  var image_form = document.forms.namedItem("profile_image_upload_form");
  var data = new FormData(image_form);
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var x = this.responseText;
      alert(x);
    }
  };

  xhttp.open("POST", "php/profile_image_upload.php", true);
  xhttp.send(data);
}



function tourist_place_sort(){
  tourist_place_cost_sort = (tourist_place_cost_sort + 1)%3;
  search_tourist_place();
}
function pakage_sort(){
  pakage_cost_sort = (pakage_cost_sort + 1)%3;
  search_pakage_catagory();
}



function search_hotel(){

  var name = document.getElementById("hotel_search").value;
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("hotel_body").innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "php/search_hotel.php?name="+name, true);
  xhttp.send();
}

function search_tourist_place(){

  var name = document.getElementById("tourist_place_search").value;
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tourist_place_body").innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "php/search_tourist_place.php?name="+name+"&c="+tourist_place_cost_sort, true);
  xhttp.send();
}

function search_pakage_catagory(){

  var name = document.getElementById("pakage_catagory_search").value;
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("pakage_catagory_body").innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "php/search_pakage_catagory.php?name="+name+"&c="+pakage_cost_sort, true);
  xhttp.send();
}


function search_galary(){

  var name = document.getElementById("galary_search").value;
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("Galary_body").innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "php/search_galary.php?name="+name, true);
  xhttp.send();
}


function delete_galary(id){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var x = this.responseText;
      if (x == "ok") {
        alert("One galary Delete Successfull");
      }
      else{
        alert(x);
      }
      $('#Galary_body').load('galary.php');

    }
  };

  xhttp.open("GET", "php/delete_galary.php?id="+id, true);
  xhttp.send();
}


function delete_tourist_place(id){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var x = this.responseText;
      if (x == "ok") {
        alert("One galary Delete Successfull");
      }
      else{
        alert(x);
      }
      $('#Galary_body').load('galary.php');

    }
  };

  xhttp.open("GET", "php/delete_galary.php?id="+id, true);
  xhttp.send();
}

function profile_save_changes_onclick(){
  var profile_save_change_form  = document.forms.namedItem("profile_save_change_form");
  var form_data = new FormData(profile_save_change_form);
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);
      if (myObj[4] == 1) {
        alert("Your Update Successfully ");
      }else{
        alert("Something Error");
      }
      document.getElementById("profile_user_name").value = myObj[1];
      document.getElementById("profile_name").value = myObj[0];
      document.getElementById("profile_phone_number").value = myObj[3];
      document.getElementById("profile_email").value = myObj[2];
    }
  };

  xhttp.open("POST", "php/profile_save_changes_json.php", true);
  xhttp.send(form_data);

}


function profile(){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);

      if (myObj[0]=="no") {
        return 0;
      }
      else{
        document.getElementById("profile_image_img_tag").src = "profile_image/"+myObj[5];
        document.getElementById("profile_user_name").value = myObj[1];
        document.getElementById("profile_name").value = myObj[0];
        document.getElementById("profile_phone_number").value = myObj[4];
        document.getElementById("profile_email").value = myObj[2];
        return 1;
      }
    }
  };

  xhttp.open("GET", "php/profile_json.php", true);
  xhttp.send();
}
function tourist_place_onclick_fun(id){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);
      document.getElementById("tourist_place_onclick_image").src = myObj[0];
      document.getElementById("tourist_place_onclick_place_name").innerHTML = myObj[1];
      document.getElementById('tourist_place_onclick_place_name_input').value = myObj[1];
      document.getElementById("tourist_place_onclick_city_town").value = myObj[2];
      document.getElementById("tourist_place_onclick_country").value=myObj[3];
      document.getElementById("tourist_place_onclick_travel_cost").value = myObj[4]+"TK";
      document.getElementById("place_id").value = id;
      $('#tourist_place_onclick').modal();

    }
  };

  xhttp.open("GET", "php/tourist_place_onclick.php?id="+id, true);
  xhttp.send();
}

function update_tourist_place(){
  var update_form = document.forms.namedItem('tourist_place_edit')
  var data = new FormData(update_form)
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var x = this.responseText;
      if (x==1) {
        alert("Successfully Update");
      }
      else{
        alert("Something Wrong ");
      }
    }
  };

  xhttp.open("POST", "php/update_tourist_place.php", true);
  xhttp.send(data);
}



function hotels_onclick_fun(id){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);

      document.getElementById("hotel_onclick_image").src = myObj[0];
      document.getElementById("hotel_onclick_hotel_name_header").innerHTML = myObj[1];
      document.getElementById("hotel_onclick_name").value = myObj[1];
      document.getElementById("hotel_id").value = id;
      document.getElementById("hotel_onclick_city_town").value = myObj[2];
      document.getElementById("hotel_onclick_country").value = myObj[3];
      document.getElementById("hotel_onclick_cost").value = myObj[4];
      $('#hotel_onclick').modal();

    }
  };

  xhttp.open("GET", "php/hotel_onclick_json.php?id="+id, true);
  xhttp.send();
}


function update_hotels(){
  var update_form = document.forms.namedItem('tourist_place_edit')
  var data = new FormData(update_hotel)
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var x = this.responseText;
      if (x==1) {
        alert("Successfully Update");
      }
      else{
        alert(x);
      }
    }
  };
  xhttp.open("POST", "php/update_hotel.php", true);
  xhttp.send(data);
}

function pakage_onclick_fun(id){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);

      document.getElementById("pakage_onclick_place_image").src = myObj[0];
      document.getElementById("pakage_onclick_hotel_image").src = myObj[1];
      document.getElementById("pakage_onclick_place_name").innerHTML = myObj[2];
      document.getElementById("pakage_onclick_hotel_name").innerHTML = myObj[4];
      document.getElementById("pakage_onclick_plae_location").innerHTML = myObj[3];
      document.getElementById("pakage_onclick_hotel_location").innerHTML = myObj[5];
      document.getElementById("pakage_onclick_person").innerHTML = myObj[8];
      document.getElementById("pakage_onclick_duration").innerHTML = myObj[7];
      document.getElementById("pakage_onclick_travel_cost").innerHTML = myObj[6]+"TK";
      document.getElementById("pakage_onclick_pakage_name").innerHTML = myObj[9];      
      $('#pakage_onclick').modal();

    }
  };

  xhttp.open("GET", "php/pakage_onclick_json.php?id="+id, true);
  xhttp.send();
}

function req_aprove(id){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
          
     var ans = this.responseText;
     $('#travel_req_body').load('travel_request.php');

    }
  };

  xhttp.open("GET", "php/req_approve.php?id="+id, true);
  xhttp.send();
}





$(document).ready(function (e) {
    $('#sidebarCollapse').on('click', function (e) {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });
});

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}



var galary_add = document.forms.namedItem("galary_image_add_form");
var hotel_add = document.forms.namedItem("hotel_add_form");
var tourist_place_add  = document.forms.namedItem("tourist_place_add_form");
var pakage_add  = document.forms.namedItem("pakage_add_form");

galary_add.addEventListener('submit', function(ev) {

  var oOutput = document.getElementById('demo'),
      oData = new FormData(galary_add);

  var oReq = new XMLHttpRequest();
  oReq.open("POST", "php/galary_image_upload.php", true);
  oReq.onload = function(oEvent) {
    if (oReq.status == 200) {
      var v =this.responseText;
      if(v=="ok"){
        alert("Image Upload");
      }
    	$('#galary_image').modal('hide');
    	$('#Galary_body').load('galary.php');
    } else {
      oOutput.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
    }
  };

  oReq.send(oData);
  ev.preventDefault();
}, false);


hotel_add.addEventListener('submit', function(ev) {

  var oOutput = document.getElementById('hotel_demo'),
      oData = new FormData(hotel_add);

  var oReq = new XMLHttpRequest();
  oReq.open("POST", "php/hotel_add.php", true);
  oReq.onload = function(oEvent) {
    if (oReq.status == 200) {
      oOutput.innerHTML =this.responseText;
    	$('#add_hotel').modal('hide');
    	$('#hotel_body').load('hotel.php');
    } else {
      oOutput.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
    }
  };

  oReq.send(oData);
  ev.preventDefault();
}, false);


tourist_place_add.addEventListener('submit', function(ev) {

  var oOutput = document.getElementById('toursit_place_demo'),
      oData = new FormData(tourist_place_add);

  var oReq = new XMLHttpRequest();
  oReq.open("POST", "php/tourist_place_add.php", true);
  oReq.onload = function(oEvent) {
    if (oReq.status == 200) {
      oOutput.innerHTML =this.responseText;
      $('#tourist_place').modal('hide');
       $('#tourist_place_body').load('toursit_place.php');
    } else {
      oOutput.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
    }
  };

  oReq.send(oData);
  ev.preventDefault();
}, false);


pakage_add.addEventListener('submit', function(ev) {

  var oOutput = document.getElementById('pakage_demo'),
      oData = new FormData(pakage_add);

  var oReq = new XMLHttpRequest();
  oReq.open("POST", "php/pakage_add.php", true);
  oReq.onload = function(oEvent) {
    if (oReq.status == 200) {
      oOutput.innerHTML =this.responseText;
      $('#pakage_catagory_modal').modal('hide');
      $('#pakage_catagory_body').load('pakage_catagory.php');
    } else {
      oOutput.innerHTML = "Error " + oReq.status + " occurred when trying to upload your file.<br \/>";
    }
  };

  oReq.send(oData);
  ev.preventDefault();
}, false);
