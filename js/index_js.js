var tourist_place_cost_sort = 0;
var pakage_cost_sort = 0;

function contant_index(id) {
  var ids = ["galary","toursit_place","pakage_catagory","hotel","invoice_hotel","profile","dashbord"];
  for (var i = 0;i< ids.length;i++) {
    document.getElementById(ids[i]).style.display = "none";
  }
  document.getElementById(id).style.display = "block";
  if(id == 'galary'){
    $('#Galary_body').load('galary.php');
  }else if(id == 'hotel' ){
    $('#tourist_place_onclick').modal('hide');
    $('#hotel_body').load('hotel.php');
    
  }else if(id == 'toursit_place'){
    $('#tourist_place_body').load('toursit_place.php');
  }else if(id == 'pakage_catagory'){    
    $('#pakage_catagory_body').load('pakage_catagory.php');
  }else if(id == 'profile'){
    profile();
  }else if(id == 'dashbord'){
    $('#dashbord_body').load('dashbord.php');
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

function profile(){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);
        document.getElementById("profile_image_img_tag").src = "profile_image/"+myObj[5];
        document.getElementById("profile_user_name").value = myObj[1];
        document.getElementById("profile_name").value = myObj[0];
        document.getElementById("profile_ac_number").value = myObj[4];
        document.getElementById("profile_payment_type").value = myObj[3];
        document.getElementById("profile_email").value = myObj[2];
    }
  };

  xhttp.open("GET", "php/profile_json.php", true);
  xhttp.send();
}

/*["galary","toursit_place","hotel","invoice_hotel","pakage_catagory","profile"];*/

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

function profile_save_changes_onclick(){
  var profile_save_change_form  = document.forms.namedItem("profile_save_change_form");
  var form_data = new FormData(profile_save_change_form);
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);
      if (myObj[5] == 1) {
        alert("Your Update Successfully ");
      }else{
        alert("Something Error");
      }
      document.getElementById("profile_user_name").value = myObj[1];
      document.getElementById("profile_name").value = myObj[0];
      document.getElementById("profile_ac_number").value = myObj[3];
      document.getElementById("profile_email").value = myObj[2];
      document.getElementById("profile_payment_type").value = myObj[4];
    }
  };

  xhttp.open("POST", "php/profile_save_changes_json.php", true);
  xhttp.send(form_data);

}




function tourist_place_onclick_fun(id){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);

      document.getElementById("tourist_place_onclick_image").src = myObj[0];
      document.getElementById("tourist_place_onclick_place_name_header").innerHTML = myObj[1];
      document.getElementById("tourist_place_onclick_place_name").innerHTML = myObj[1];
      document.getElementById("tourist_place_onclick_location").innerHTML = myObj[1]+"<br>"+myObj[2]+","+myObj[3];
      document.getElementById("tourist_place_onclick_travel_cost").innerHTML = myObj[4]+"TK";
      document.getElementById("tourist_place_book_place_id").value = id;
      document.getElementById("tourist_place_book_travel_cost").value = myObj[4];
      $('#tourist_place_onclick').modal();

    }
  };

  xhttp.open("GET", "php/tourist_place_onclick.php?id="+id, true);
  xhttp.send();
}



function tourist_place_book(id,user_id){

  var place_id = document.getElementById("tourist_place_book_place_id").value;
  var duration = document.getElementById("tourist_place_book_no_of_days").value;
  var person = document.getElementById("tourist_place_book_no_of_person").value;
  var cost = document.getElementById("tourist_place_book_travel_cost").value
  var date = document.getElementById("place_book_starting_date").value
  var formdata = new FormData(document.forms.namedItem("booking_confirm_tourist_place"));


  formdata.append('place_id',place_id);
  formdata.append('user_id',user_id);
  formdata.append('cost',cost);
  formdata.append('s_date',date);

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var ans = this.responseText;
      if (ans == 'Error') {
        alert("not boked");
      }
      else{
        alert("in pending "+ans)
        if (id == 'hotel') {
          document.getElementById("booked_id").value = ans;
          contant_index('hotel');
        }
      }
      
      $('#tourist_place_onclick').modal('hide');

    }
  };

  xhttp.open("POST", "php/tourist_place_book.php", true);
  xhttp.send(formdata);
}

function hotel_book(){

  var hotel_id = document.getElementById("hotel_id").value;
  var booked_id = document.getElementById("booked_id").value;
  
  var formdata = new FormData();
  formdata.append('hotel_id',hotel_id);
  formdata.append('booked_id',booked_id);

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var ans = this.responseText;
      alert(ans);      
      $('#hotel_onclick').modal('hide');

    }
  };

  xhttp.open("POST", "php/hotel_book.php", true);
  xhttp.send(formdata);
}

function hotels_onclick_fun(id){
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);

      document.getElementById("hotel_onclick_image").src = myObj[0];
      document.getElementById("hotel_onclick_name").innerHTML = myObj[1];
      document.getElementById("hotel_onclick_location").innerHTML = myObj[1]+"<br>"+myObj[2]+","+myObj[3];
      document.getElementById("hotel_onclick_cost").innerHTML = myObj[4]+"TK";
      document.getElementById("hotel_id").value = id;
      $('#hotel_onclick').modal();

    }
  };

  xhttp.open("GET", "php/hotel_onclick_json.php?id="+id, true);
  xhttp.send();
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
      document.getElementById("pakage_id").value = id;      
      $('#pakage_onclick').modal();

    }
  };

  xhttp.open("GET", "php/pakage_onclick_json.php?id="+id, true);
  xhttp.send();
}


function pakage_book(user_id){

  var id =document.getElementById("pakage_id").value;
  var s_date = document.getElementById('pakage_book_starting_date').value;
  var formdata = new FormData();

  formdata.append('pakage_id',id);
  formdata.append('user_id',user_id);
  formdata.append('s_date',s_date);

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var ans = this.responseText;
      $('#pakage_onclick').modal('hide');
      alert(ans);
     
      

    }
  };

  xhttp.open("POST", "php/pakage_book.php", true);
  xhttp.send(formdata);
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
function tourist_place(id){
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("toursit_place").innerHTML = this.responseText;
		}
	};

	xhttp.open("GET", "php/tourist_place.php?id="+id, true);
	xhttp.send();
}


function hotels(id){
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("hotel").innerHTML = this.responseText;
		}
	};

	xhttp.open("GET", "php/hotel.php?id="+id, true);
	xhttp.send();
}