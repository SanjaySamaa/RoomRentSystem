
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RoomRentSystem-SignUp</title>
    <link rel="stylesheet" href="Signup.css">
</head>
<body>
   
   
    <div class="container">
        <div class="errormsg" id="errormsg"></div>
        <div class="title"> Room Rent System Registration</div>
            <form action="signup.php" method="post" name="signup" onsubmit="return validate()">
                <div class="userdetails">
                    <div class="inputbox">
                        <span class="details">First Name</span>
                        <input type="text" name="firstname" placeholder="Enter your first name" required>
                    </div>
                    <div class="inputbox">
                        <span class="details">LastName</span>
                        <input type="text" name="lastname" placeholder="Enter your last name" required>
                    </div>
                    <div class="inputbox">
                        <span class="details"> Number</span>
                        <input type="number" name="number" placeholder="Enter your number" required>
                    </div>
                    <div class="inputbox">
                        <span class="details">Email </span>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="inputbox">
                        <span class="details">Password</span>
                        <input type="password"  name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="inputbox">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="confirmpassword" placeholder="Confirm your password" required>
                    </div>
                </div>
                    <div class="genderdetails">
                        <input type="radio" name="gender" value="male" id="one">
                        <input type="radio" name="gender" value="female" id="two">
                        <input type="radio" name="gender" value="others" id="three">
                        <span class="gendertitle"> Gender</span>
                        <div class="category">
                        <label for="one">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="two">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="three">
                            <span class="dot three"></span>
                            <span class="gender">Others</span>
                        </label>
                  
                    </div>
                </div>
             
        
                        <div class="button">
                            <input type="submit" name="submit" value="Register">
                </div>
                <div class="alreadyhaveaccount">
                    <p>Already Have Account <a href="../login/loginform.php">click here</a> </p>
                </div>
            
            </form>
      </div>
      <script>
        //   document.getElementById('errormsg').innerText="first name to short";
          function validate(){
              
              let x = document.forms['signup']['firstname'].value;
              if(x.length<3){
                document.getElementById("errormsg").style.background="red";
                  document.getElementById('errormsg').innerText="Firstname too short";
                 
                  return false;
                  
              }

              let y = document.forms['signup']['lastname'].value;
              if(y.length<3){
                  document.getElementById("errormsg").style.background="red";
                document.getElementById('errormsg').innerText="Lastname too short";
                
                  return false;
              }
             
            let a = document.forms['signup']['number'].value;
              if(a.length<10){
                document.getElementById("errormsg").style.background="red";
                  document.getElementById('errormsg').innerText=" Number too short";
                
                  return false;
              }
             

              let z = document.forms['signup']['password'].value;
              if(z.length<8){
                document.getElementById("errormsg").style.background="red";
                  document.getElementById('errormsg').innerText="Password too short";
                
                  return false;
              }
              
            
              let b = document.forms['signup']['gender'].value;
              if(b==""){
                document.getElementById("errormsg").style.background="red";
                  document.getElementById('errormsg').innerText="choose your gender please";
             
                  return false;
              }
            
            
          }

          </script>

</body>
</html>
