<html>
<head>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<link rel="stylesheet" href="../csss/ho1.css">
</head>
<body>
<div class="mobo">
<div class="sym"><input type="button" value="" id="suga" onclick="location.href='final.html';"></div>
       <div class="headi">
           
           <h1>Doctor Patient Portal</h1>
           <div class="he">Better Health Better Future</div>
       </div>
<h1>Sign-Up</h1>
<div class="main">
<div class="hea"><label for="Fname">First Name</label></div>
<div class="inp"><input type="text" name="Fname" id="Fname"></div>
<div class="hea"><label for="Sname">Middle Name</label></div>
<div class="inp"><input type="text" name="Sname" id="Sname"></div>
<div class="hea"><label for="Lname">Last Name</label></div>
<div class="inp"><input type="text" name="Lname" id="Lname"></div>
<div class="hea"><label for="ag">Age</label></div>
<div class="inp"><input type="number" name="ag" id="ag"></div>
<div class="hea"><label for="gen">Select Gender</label></div>
<div class="inp"><input type="radio" name="gen" value="Male">Male <input type="radio" name="gen" value="Female">Female <input type="radio" name="gen" value="Other">Other</div>
<div class="hea"><label for="ph">Phone Number</label></div>
<div class="inp"><input type="text" name="ph" id="ph"></div>
<div class="hea"><label for="em">Email-Id</label></div>
<div class="inp"><input type="email" name="em" id="em"></div>
<div class="hea"><label for="ad">Address</label></div>
<div class="inp"><textarea name="ad" id="ad" cols="30" rows="10"></textarea></div>
<div class="hea"><label for="use">Username</label></div>
<div class="inp"><input type="text" name="use" id="use"></div>
<div class="hea"><label for="pas">Password</label></div>
<div class="inp"><input type="text" name="pas" id="pas"></div>
<div class="hea"><label for="ch">Sign Up As</label></div>
<div class="inp"><input type="radio" name="chi" value="Doctor">Doctor
<input type="radio" name="chi" value="User">User</div>
<div class="userad" style="display:none;">
<div class="hea"><label for="blood">Blood Group</label></div>
<div class="inp"><select name="blood" id="blood">
<option value="A+ve">A+ve</option>
<option value="A-ve">A-ve</option>
<option value="B+ve">B+ve</option>
<option value="B-ve">B-ve</option>
<option value="O+ve">O+ve</option>
<option value="O-ve">O-ve</option>
<option value="AB+ve">AB+ve</option>
<option value="AB-ve">AB-ve</option>
</select></div>
<div class="hea"> <label for="prob"> Problems:</label></div> 
<div class="inp"> <input type="checkbox" name="prob" value="Sugar">Blood Sugar
<input type="checkbox" name="prob" value="High-BP">High BP
<input type="checkbox" name="prob" value="Low-BP">Low BP
<input type="checkbox" name="prob" value="Asthama">Asthama
</div>
<div class="hea"> <label for="alle">Allergies(If Any)</label> </div>
<div class="inp"> <input type="text" name="alle" id="alle"></div>
<div class="hea"> <label for="ops">Past Operations(Surgical)</label> </div>  
<div class="inp"> <input type="text" name="ops" id="ops"></div>
<div class="hea"> <label for="opo">Past Operations(Ortho)</label> </div> 
<div class="inp"> <input type="text" name="opo" id="opo"></div>
<div class="hea"> <label for="opro">Other Problems(if any)</label> </div>
<div class="inp"> <input type="text" name="oprob" id="oprob"> </div>
</div>
<div class="docrad" style="display:none">
<div class="hea"><label for="dty"> Type:</label></div> 
<div class="inp"> <input type="checkbox" name="dty" value="MBBS">MBBS
<input type="checkbox" name="dty" value="BDS">BDS
<input type="checkbox" name="dty" value="BAMS">BAMS
<input type="checkbox" name="dty" value="BUMS">BUMS
<input type="checkbox" name="dty" value="BHMS">BHMS
<input type="checkbox" name="dty" value="BYMS">BYMS
</div>
<div class="hea"><label for="dpg">Any Post Graduation </label> </div>
<div class="inp"> <input type="checkbox" name="dpg">Doctor Of Medicine(MD)
<input type="checkbox" name="dpg">Masters Of Surgery(MS)
<input type="checkbox" name="dpg">Diplomate Of National Board(DNB)
</div>
<div class="hea"> <label for="pgsp">Speciality in PG</label> </div>
<div class="inp"><input type="text" name="spg" id="spg"></div> 

<div class="hea"><label for="prc">Practioning in</label> </div>
<div class="inp"> 
<input type="checkbox" name="probb" value="Clinics">Clinics
    <input type="checkbox" name="proo" value="Hospitals">Hospitals
    <input type="checkbox" name="prr" value="Nursing Homes">Nursing Homes    
</div>
<div class="clin" style="display:none;" id="clin"><div class="hea"><label for="nc">Number of Clinics:</label></div><div class="inp"><input type="text" name="nc" id="nc"></div></div>
    <div class="hosp" style="display: none;"><div class="hea"><label for="nh">Number of Hospitals:</label></div><div class="inp"><input type="text" name="nh" id="nh"></div></div>
    <div class="nurh" style="display: none;"><div class="hea"><label for="nnh">Number of Nursing Homes:</label></div><div class="inp"><input type="text" name="nnh" id="nnh"></div></div>
    <div class="but"><input type="button" value="OK" id="buttonn"></div>
    <div class="nnnn" style="margin:0px 260px;"></div>
</div>
<div class="but"><input type="button" value="Sign Up" id="butto"></div>
<div class="ddoc" style="display:none;">
    <form action="ddoc.php" method="post" enctype="multipart/form-data">
<div class="hea"><label for="cerd">Upload Certlificates:</label> </div> <div class="inp"> <input type="file" name="cerd[]" id="cerd"></div>
<div class="inp"><input type="submit" value="Ok"></div>
</form>
</div>
<div class="udoc" style="display:none;">
    <form action="udoc.php" method="post" enctype="multipart/form-data">
<div class="hea"><label for="img">Upload recent medical records</label></div> 
<div class="inp"> <input type="file" name="img[]" id="img" multiple> </div>
<div class="inp"><input type="submit" value="Ok"></div>
</form>
</div>
</div>
</div>


    <script>
    $(document).ready(function(){
        
         $('input[name="chi"]').click(function(){
             var ty=$("input[name='chi']:checked").val();
             //alert(ty);
             if(ty=="Doctor")
             {
                 $(".userad").hide();
                 $(".docrad").show();
             }
             if(ty=="User")
             {
                 $(".docrad").hide();
                 $(".userad").show();
             }
         });

         $('input[name="probb"]').click(function(){
             $(".clin").show();
        });
        $('input[name="proo"]').click(function(){
             $(".hosp").show();
        });
        $('input[name="prr"]').click(function(){
             $(".nurh").show();
        });
     $("#buttonn").click(function(){
         var nc=$("#nc").val();
         var nh=$("#nh").val();
         var nnh=$("#nnh").val();
// // alert(nc+nh+nnh);
         
             var i;
              for(i=0;i<=nc-1;i++)
              {
                 var l="<label for='txt'>Address Of Clinic:&nbsp</label>&nbsp<input type='text' name='txt' id='inc"+i+"'><br><label for='vh'>Visiting Hours of Clinic:</label><input type='text' name='vh' id='ivc"+i+"'><br><label for='txtr'>Numbre of Patients:&nbsp</label>&nbsp<input type='text' name='txtt' id='npc"+i+"'><br>";
               $(".nnnn").append(l);
              }
//              //var i;
              for(i=0;i<=nh-1;i++)
              {
                 var l="<label for='txt'>Address Of Hospital:&nbsp</label>&nbsp<input type='text' name='txt' id='inh"+i+"'> &nbsp<label for='vh'>Visiting Hours of Hospital:</label><input type='text' name='vh' id='ivh"+i+"'>&nbsp<br>&nbsp<br><label for='txtr'>Numbre of Patients:&nbsp</label>&nbsp<input type='text' name='txtt' id='nph"+i+"'>";
               $(".nnnn").append(l);
              }
              var i;
              for(i=0;i<=nnh-1;i++)
              {
                 var l="<label for='txt'>Address Of Nursing Home:&nbsp</label>&nbsp<input type='text' name='txt' id='innh"+i+"'> &nbsp<label for='vh'>Visiting Hours of Nursing Home:</label><input type='text' name='vh' id='ivnh"+i+"'>&nbsp<br>&nbsp<br><label for='txtr'>Numbre of Patients:&nbsp</label>&nbsp<input type='text' name='txtt' id='npnh"+i+"'>";
               $(".nnnn").append(l);
              }

     });
     $("#butto").click(function(){
//     alert("hii");
     var fn=$("#Fname").val();
     var mn=$("#Sname").val();
     var ln=$("#Lname").val();
     var un=$("#use").val();
     var ag=$("#ag").val();
     var gen=$("input[name='gen']:checked").val();
     var pho=$("#ph").val();
     var em=$("#em").val();
     var ad=$("#ad").val();
     var ps=$("#pas").val();
//     //var ty=$("input[name='ch']:checked").val();
     var tyi=$("input[name='chi']:checked").val();
     //alert("msin button"+tyi);
     if(tyi=="User")
     {
        var bg=$("#blood").val();
        var pro="";
        $('input[name="prob"]:checked').each(function(){
         pro=pro+" "+this.value;
        }); 
        var alle=" ";
        var ops=" ";
        var opo=" ";
        var opro=" ";
        var alle=$("#alle").val();
        var ops=$("#ops").val();
        var opo=$("#opo").val();
        var opro=$("#oprob").val();
    /*var doc = [];
    for (var i = 0; i < $("input[name=img]").get(0).files.length; ++i) {
        doc.push($("input[name=img]").get(0).files[i].name);
    }*/


        // var doc=$("#imm").val();
        if(bg=="")
        {
            alert("Select Blood Group");
            return false;
        }
        if(doc=="")
        {
            alert("Upload necessary documents");
            return false;
        }
     }
     if(tyi=="Doctor")
     {
         var type="";
         var pro=" ";
         var bg=" ";
         var doc=" ";
                  var alle=" ";
        var ops=" ";
        var opo=" ";
        var opro=" ";
         $('input[name="dty"]:checked').each(function(){
         type=type+" "+this.value;
        });
        var pg="";
        $('input[name="dpg"]:checked').each(function(){
         pg=pg+" "+this.value;
        });
        var pat = [];
    /* for (var i = 0; i < $("input[name=cerd]").get(0).files.length; ++i) {
        pat.push($("input[name=cerd]").get(0).files[i].name);
    } */
        // var pat=$("#cerd").val();
        if(pg!="")
        {
            var spe=$("#spg").val();
            if(spe=="")
            {
             alert("Please mention speciality");
             return false;
            }
        }
        /* if(pat=="")
        {
            alert("Please upload necessary certificates");
            return false;
                    } */
     }
     if(fn=="")
     {
         alert("Please enter your First Name");
         return false;
     }
     if(mn=="")
     {
         alert("Please enter your Middle Name");
         return false;
     }
     if(ln=="")
     {
         alert("Please enter your Last Name");
         return false;
     }
     if(ag==""||(isNaN(ag)))
     {
         alert("Enter valid age");
         return false;
     }
     if(gen=="")
     {
         alert("Select valid gender");
         return false;
     }
     if(pho==""||(isNaN(pho))||(pho.length<10))
     {
         alert("Enter valid Phone Number");
         return false;
     }
     if(em=="")
     {
         alert("Enter Email");
         return false;
     }
     if(ad=="")
     {
         alert("Enter Address");
         return false;
     }
     if(un!="")
     {
         var reg=/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
         var t=reg.test(un);
         if(!t)
         {
             alert("Username must contain alphabets,numbers and special characters");
             return false;
         }
     }
     if(ps!="")
     {
         var reg=/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
         var te=reg.test(ps);
         if(!te)
         {
            alert("Password must contain alphabets,numbers and special characters");
             return false;
         }
     }
     if(tyi=="")
     {
         alert("Select your type");
         return false;
     }
     var nc=$("#nc").val();
         var nh=$("#nh").val();
         var nnh=$("#nnh").val();
         var adc="";
         var vhc="";
         var noc="";
         for(var i=0;i<nc;i++)
         {
             // alert("hii");
              adc=adc+","+$("#inc"+i).val();
              vhc=vhc+","+$("#ivc"+i).val();
              noc=noc+","+$("#npc"+i).val();
              //alert(ad);
         }
         var adh="";
         var vhh="";
         var noh="";
         for(var i=0;i<nh;i++)
         {
             // alert("hii");
              adh=adh+","+$("#inh"+i).val();
              vhh=vhh+","+$("#ivh"+i).val();
              noh=noh+","+$("#nph"+i).val();
             //  alert(ad);
         }
         var adnh="";
         var vhnh="";
         var nonh="";
         for(var i=0;i<nnh;i++)
         {
             // alert("hii");
              adnh=adnh+","+$("#innh"+i).val();
              vhnh=vhnh+","+$("#ivnh"+i).val();
              nonh=nonh+","+$("#npnh"+i).val();
//             //  alert(ad);
         }
         //var loc=adc+"-"+adh+"-"+adnh;
         //var vhrs=vhc+"="+vhh+"="+vhnh;

    
     if((fn!="")&&(mn!="")&&(ln!="")&&(ag!="")&&(gen!="")&&(pho!="")&&(em!="")&&(ad!="")&&(un!="")&&(ps!="")&&(tyi!=""))
//     //else
     {
         //alert("ajaxx");
         //alert(tyi);
         // alert(fn+mn+ln+ag+gen+ad+pho+em+un+ps+tyi+bg+pro+alle+ops+opo+opro+doc+type+pg+pat);
         var dataa='fnam='+fn+'&mnam='+mn+'&lnam='+ln+'&ag='+ag+'&gen='+gen+'&ad='+ad+'&ph='+pho+'&em='+em+'&us='+un+'&ps='+ps+'&ty='+tyi+'&bg='+bg+'&pro='+pro+'&alle='+alle+'&ops='+ops+'&opo='+opo+'&opro='+opro+'&doc='+doc+'&type='+type+'&pg='+pg+'&pat='+pat+'&adc='+adc+'&vhc='+vhc+'&adh='+adh+'&vhh='+vhh+'&adnh='+adnh+'&vhnh='+vhnh+'&noc='+noc+'&noh='+noh+'&nonh='+nonh;
         //alert(dataa);
         $.ajax({
     type:"POST",
     url:"supp.php",
     data:dataa,
     success:function(result){
         //console.log(result);
         //alert(tyi);
        if(tyi=="User")
          {
              //alert("u");
              $(".udoc").show();
              $(".ddoc").hide();
        //    window.location.href="udoc.php";
          }
          if(tyi=="Doctor")
          {
              //alert("d");
              $(".ddoc").show();
              $(".udoc").hide();
            // window.location.href="ddoc.php";
          }
          if(tyi=="Admin")
          {

          }
         //alert(result);
     }
 });
     }
 });
    });
    </script>
</body>
</html>