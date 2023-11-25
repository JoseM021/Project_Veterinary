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
    use Dotenv\Dotenv;
    require_once __DIR__ . "/vendor/autoload.php";

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    session_start();
/*     if (isset($_SESSION["User_id"])) {
        echo "User ID: " . $_SESSION["User_id"];
    } else {
        echo "User ID no está establecido";
    } */
    ?>
    <header>
        <div class="header__logo">
            <img src="img/Logo_Veterinary_Alternative.png" alt="Logo-Veterinary">
        </div>
        <?php if (empty($_SESSION["User_id"])) {?>
            <div class="rightContainerMain__buttons">
                <input type="checkbox" id="menu-toggle" class="menu-toggle">
                <label for="menu-toggle" class="rightMore__button">More</label>
                <div class="right__buttons">
                    <a href="register.php">Registro</a>
                    <a href="login.php">Ingresar</a>
                </div>
            </div>
        <?php } else {?>
            <div class="right__buttons">
                <div class="welcome_user"><p>Bienvenido, <?php echo $_SESSION["username"]; ?> !</p></div>
                <a href="closeSession.php">
                    Cerrar Sesión
                </a>
            </div>
        <?php }?>
    </header>
    <body>
        <?php if (empty($_SESSION["User_id"])) {?>
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
                <article class="article-one article-one--Session">
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
        <?php } else {?>
            <main class="centralContainer centralContainer__Session">
                <div class="ContainerMain_S">
                    <h2>Disfruta de nuestras funciones para tu mascota</h2>
                </div>
                <div class="ContainerSubMain_S">
                    <section class="ContainerSubMain ContainerSubMain--Session">
                        <a href="/viewPet/mascotaIndex.php">
                            <article class="article-one--Session">
                                <div><img src="img/registered-vaccine-veterinary.png" alt="registered-pet"></div>
                                <p class="article-tittle article-tittle--Session">
                                    Registrar Mascotas
                                </p>
                            </article>
                        </a>
                    </section>
                    <section class="ContainerSubMain ContainerSubMain--Session">
                        <a href="/viewVaccine/vaccineIndex.php">
                            <article class="article-one--Session">
                                <div><img src="img/vaccine-veterinary.png" alt="vaccine-registered"></div>
                                <p class="article-tittle article-tittle--Session">
                                    Registrar Vacunas
                                </p>
                            </article>
                        </a>
                    </section>
                    <section class="ContainerSubMain ContainerSubMain--Session">
                        <a href="/viewControlVaccine/controlVaccine.php">
                            <article class="article-one--Session">
                                <div><img src="img/vaccineTWO-veterinary.png" alt="vaccine-pet"></div>
                                <p class="article-tittle article-tittle--Session">
                                    Asigna Vacunas
                                </p>
                            </article>
                        </a>
                    </section>
                    <section class="ContainerSubMain ContainerSubMain--Session">
                        <a href="/viewPet/mascotaRegistered.php">
                            <article class="article-one--Session">
                                <div><img src="img/icon-dog-pet.png" alt="icon-dog-pet"></div>
                                <p class="article-tittle article-tittle--Session">
                                    Ver mascotas
                                </p>
                            </article>
                        </a>
                    </section>
                    <section class="ContainerSubMain ContainerSubMain--Session">
                        <a href="/viewVaccine/vaccineRegistered.php">
                            <article class="article-one--Session">
                                <div><img src="img/icon-vaccine-thr.png" alt="icon-vaccine-pet"></div>
                                <p class="article-tittle article-tittle--Session">
                                    Ver Vacunas
                                </p>
                            </article>
                        </a>
                    </section>
                    <section class="ContainerSubMain ContainerSubMain--Session">
                        <a href="/viewControlVaccine/controlVaccineRegistered.php">
                            <article class="article-one--Session">
                                <div><img src="img/guy-veterinary-icon.png" alt="icon-guyvet-pet"></div>
                                <p class="article-tittle article-tittle--Session">
                                    Ver Vacunas Asignadas
                                </p>
                            </article>
                        </a>
                    </section>
                </div>
            </main>
        <?php }?>
    </body>
    <div class="welcome__message">
        <div class="welcome__icon">
            <img src="img/Logo_Veterinary_Alternative.png" alt="welcome-icon">
        </div>
    </div>
    <script src="/javascript/loaderIndex.js"></script>
</body>
</html>