<?php
include 'menu.php';
    try{
        $sql="SELECT * FROM usuario WHERE pk_identificacion=$cedula";
        $resultado=$conectar->prepare($sql);
        $resultado->execute(array());
        while($consulta=$resultado->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="signupFrm">
    <form action="actualizarArtesano2.php?cod=<?php echo $consulta['pk_identificacion'] ?>" class="form" method="post">
      <h1 class="title">Actualizacion de datos</h1>

      <div class="inputContainer">
        <input type="text" class="input" name="txtn" value="<?php echo $consulta['nombre_user'];?>" required>
        <label for="" class="label" style="color:rgb(90,90,90);" >Nombre completo</label>
      </div>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="a" name="txttel" value="<?php echo $consulta['telefono_user'];?>" required>
        <label for="" class="label" style="color:rgb(90,90,90);" >Telefono </label>
      </div>

      <div class="inputContainer">
        <input type="text" class="input" placeholder="a" name="txtd" value="<?php echo $consulta['direccion_user'];?>" required>
        <label for="" class="label" style="color:rgb(90,90,90);">Direccion</label>
      </div>

      <input type="submit" class="submitBtn" name="btn1" value="Actualizar">
    </form>
  </div>
<!--     <form action="actualizarArtesano2.php?cod=<?php echo $consulta['pk_identificacion'] ?>" method="post" enctype="multipart/form-data">
    <div class="container">
                <h2 style="text-align:center;color:white">Actualizacion de datos</h2>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="txtn" value="<?php echo $consulta['nombre_user'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Telefono</label>
                        <input class="form-control" id="exampleFormControlTextarea1" rows="3" name="txttel" value="<?php echo $consulta['telefono_user'];?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $consulta['direccion_user'];?>" name="txtd">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Actualizar" name="btn1">
                    </div>
            </div>
    </form> -->
            <?php
        }
    }catch(Exception $e){
        die('Error al consultar productos'.$e->getMessage());
    }
    ?>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

/* Get rid of all default margins/paddings. Set typeface */
body {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  background-color: white;
  font-family: "lato", sans-serif;
}
/* Puts the form in the center both horizontally and vertically. Sets its height to 100% of the viewport's height */

.signupFrm {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin-top: -120px;
}
.form {
    background-color: white;
    width: 400px;
    border-radius: 8px;
    padding: 20px 40px;
    box-shadow: 0 10px 25px rgba(92, 99, 105, .2);
  }
  
.title {
  font-size: 50px;
  margin-bottom: 50px;
}
.inputContainer {
    position: relative;
    height: 45px;
    width: 90%;
    margin-bottom: 17px;
}
/* Style the inputs */

.input {
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    border: 1px solid #DADCE0;
    border-radius: 7px;
    font-size: 16px;
    padding: 0 20px;
    outline: none;
    background: none;
    z-index: 1;
}

/* Hide the placeholder texts (a) */

::placeholder {
  color: transparent;
}
/* Styling text labels */

.label {
    position: absolute;
    top: 15px;
    left: 15px;
    padding: 0 4px;
    background-color: white;
    color: black;
    font-size: 16px;
    transition: 0.5s;
    z-index: 0;

}
.submitBtn {
    display: block;
    margin-left: auto;
    padding: 15px 30px;
    border: none;
    background-color: green;
    color: white;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 30px;
}

.submitBtn:hover {
  background-color: green;
  transform: translateY(-2px);
}
.input:focus + .label {
    top: -7px;
    left: 3px;
    z-index: 10;
    font-size: 14px;
    font-weight: 600;
    color: green;
}
.input:focus {
    border: 2px solid green;
}
.input:not(:placeholder-shown)+ .label {
    top: -7px;
    left: 3px;
    z-index: 10;
    font-size: 14px;
    font-weight: 600;
}
/* Header Start */
#header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 80px;
    background: #e3e6f3;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
    z-index: 999;
    position: sticky;
    top: 0;
    left: 0;
}
#navbar {
    display: flex;
    align-items: center;
    justify-content: center;
}
#navbar li{
    list-style: none;
    padding: 0 20px;
    position: relative;
}
#navbar li a{
    text-decoration: none;
    font-size: 16px;
    font-weight: 600;
    color: black;
    transition: 0.3s ease;
}
#navbar li a:hover,
#navbar li a.active{
    color: #088178;
}
#navbar li a.active::after,
#navbar li a:hover::after{
    content: "";
    width: 30%;
    height: 2px;
    background: #088178;
    position: absolute;
    bottom: -4px;
    left: 20px;
}
    </style>
</body>
</html>