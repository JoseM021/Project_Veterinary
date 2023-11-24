<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/preloaderIndex.css">
    <title>Veterinaria</title>
</head>
<body>
    <?php
    session_start();
    use Dotenv\Dotenv;
    require_once __DIR__ . "/vendor/autoload.php";

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    /* if (isset($_SESSION["User_id"])) {
        echo "User ID: " . $_SESSION["User_id"];
    } else {
        echo "User ID no está establecido";
    } */
    ?>
    <header>
        <div class="header__logo">
            <img src="img/Logo_Veterinary_Alternative.png" alt="Logo-Veterinary">
        </div>
        <div class="rightContainerMain__buttons">
            <input type="checkbox" id="menu-toggle" class="menu-toggle">
            <label for="menu-toggle" class="rightMore__button">More</label>
            <div class="right__buttons">
                <a href="register.php">Registro</a>
                <a href="login.php">Ingresar</a>
            </div>
        </div>
    </header>
    <body>
        <main class="centralContainer">
            <section class="ContainerMain">
                <div class="leftContainermain">
                    <div class="imgTitleContainer">
                        <img src="img/Logo_Veterinary_Tittle.svg" alt="Logo Veterinary Tittle">
                    </div>
                    <h2>
                        Respetar a los animales es una obligación, amarlos es un privilegio.
                    </h2>
                    <h4>
                        Accede a las diversas funciones para tu mascota.
                    </h4>
                    <a href="register.php">
                        <button class="buttonRegisterDown">
                            Registrate
                        </button>
                    </a>
                </div>
                <div class="rightContainermain">
                    <img src="img/pet-main-right.png" alt="pet-main-right">
                </div>
            </section>
            <section class="ContainerSubMain">
                <article class="article-one">
                    <div><img src="img/registered-vaccine-veterinary.png" alt="registered-pet"></div>
                    <p class="article-tittle">
                        Registramos a tus mascotas
                    </p>
                    <p class="article-subtittle">
                        Disponible para ti
                    </p>
                </article>
                <article class="article-two">
                    <div><img src="img/vaccine-veterinary.png" alt="vaccine-registered"></div>
                    <p class="article-tittle">
                        Registramos tus vacunas de mascotas
                    </p>
                    <p class="article-subtittle">
                        Disponible para ti
                    </p>
                </article>
                <article class="article-three">
                    <div><img src="img/vaccineTWO-veterinary.png" alt="vaccine-pet"></div>
                    <p class="article-tittle">
                        Controlamos las vacunas de tu mascota
                    </p>
                    <p class="article-subtittle">
                        Disponible para ti
                    </p>
                </article>
            </section>
        </main>
    </body>

    <div class="welcome__message">
        <div class="welcome__icon">
            <img src="img/Logo_Veterinary_Alternative.png" alt="welcome-icon">
        </div>
    </div>
    <script src="/javascript/loaderIndex.js"></script>
</body>
</html>