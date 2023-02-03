<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<footer class="section-p1 container">
        <div class="col-4">
            <img class="logo" src="img/logo3.png" alt="">
            <p>Artesanías las Américas</p>
            <h4>Contactos</h4>
            <p><strong>Celular:</strong> 3223562765</p>
            <p><strong>Horario:</strong> 8:00 a.m - 5:00 p.m Lunes - Viernes</p>
            <div class="follow">
                <h4>Siguenos!</h4>
                <div class="icon">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col-4">
            <h4>A cerca de nosotros</h4>
            <a href="#">Informacion</a><br> 
            <a href="#">Politica de privacidad</a>
        </div>
        <div class="col-4">
            <h4>Nuestro perfil</h4>
            <a href="#">Ingresa </a><br>
            <a href="#">Ayuda</a>
        </div>
        <div class="col-4">
            <p>Diseñado y desarrollado por Artesanías las Américas</p>
        </div>
    </footer>
    <style type="text/css">
        footer {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
footer .col {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    margin-bottom: 20px;
}
footer .logo {
    margin-bottom: 30px;
}
footer h4 {
    font-size: 14px;
    padding-bottom: 20px;
}
footer p {
    font-size: 13px;
    margin: 0 0 8px 0;
}
footer a {
    font-size: 13px;
    text-decoration: none;
    color: #222;
    margin-bottom: 10px;
}
footer .follow {
    margin-top: 20px;
}
footer .follow i {
    color: #465b52;
    padding-right: 4px;
    cursor: pointer;
}
footer .install .row img {
    border: 1px solid #088178;
    border-radius: 6px;
}
footer .install img {
    margin: 10px 0 15px 0;
}
footer .follow i:hover,
footer a:hover {
    color: #088178;
}

/* Shop Product */

#page-header {
    background-image: url("../img/banner/b1.jpg");
    width: 100%;
    height: 40vh;
    background-size: cover;
    display: flex;
    justify-content: center;
    text-align: center;
    flex-direction: column;
    padding: 14px;
}
#page-header h2,
#page-header p {
    color: #fff;
}
#pagination {
    text-align: center;
}
#pagination a {
    text-decoration: none;
    background-color: #088178;
    padding: 15px 20px;
    border-radius: 4px;
    color: #fff;
    font-weight: 600;
}
#pagination a i {
    font-size: 16px;
    font-weight: 600;
}
/* Single Product */
#prodetails {
    display: flex;
    margin-top: 20px;
}

#prodetails .single-pro-image {
    width: 40%;
    margin-right: 50px;
}
.small-img-group {
    display: flex;
    justify-content: space-between;
}
.small-img-col {
    flex-basis: 24%;
    cursor: pointer;
}
#prodetails .single-pro-details {
    width: 50%;
    padding-top: 30px;
}
#prodetails .single-pro-details h4 {
    padding: 40px 0 20px 0;
}
#prodetails .single-pro-details h2 {
    font-size: 26px;
}
#prodetails .single-pro-details select {
    display: block;
    padding: 5px 10px;
    margin-bottom: 10px;
}
#prodetails .single-pro-details input {
    width: 50px;
    height: 47px;
    padding-left: 10px;
    font-size: 16px;
    margin-right: 10px;
}
#prodetails .single-pro-details input:focus {
    outline: none;
}
#prodetails .single-pro-details button {
    background: #088178;
    color: #fff;
}
#prodetails .single-pro-details span {
    line-height: 25px;
}
    </style>
</body>
</html>