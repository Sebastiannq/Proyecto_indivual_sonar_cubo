<?php 
include("config/conexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Artesanails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,600;14..32,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #faf8f6;
            color: #2d2a24;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /
        .navbar {
            background: #fff;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            padding: 16px 0;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 700;
            color: #b45f2b;
            letter-spacing: -0.5px;
        }

        .logo i {
            color: #d9772b;
            margin-right: 6px;
        }

        .nav-links {
            display: flex;
            gap: 28px;
            list-style: none;
            font-weight: 600;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #2d2a24;
            font-size: 0.95rem;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: #b45f2b;
        }

        .nav-links a i {
            margin-right: 6px;
        }

        .nav-btn-login {
            background: transparent;
            border: 2px solid #b45f2b;
            color: #b45f2b;
            padding: 8px 18px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .nav-btn-login:hover {
            background: #f7efe8;
        }

        .nav-btn-registro {
            background: #b45f2b;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 0.9rem;
        }

        .nav-btn-registro:hover {
            background: #9e4f20;
        }

        
        .user-welcome {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: #2d2a24;
            font-size: 0.95rem;
        }

        .user-welcome span {
            color: #b45f2b;
        }

        .nav-btn-logout {
            background: #f1f0ee;
            border: 1px solid #ddd2c6;
            color: #7a6c5e;
            padding: 6px 14px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.2s;
        }

        .nav-btn-logout:hover {
            background: #ffebee;
            color: #c62828;
            border-color: #ffcdd2;
        }

        .hamburger {
            display: none;
            font-size: 1.6rem;
            cursor: pointer;
            color: #2d2a24;
        }

        
        .hero {
            background: linear-gradient(135deg, #f7efe8 0%, #f0e3d9 100%);
            padding: 60px 0 70px;
            border-radius: 0 0 48px 48px;
            margin-bottom: 40px;
        }

        .hero .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
        }

        .hero-text {
            flex: 1 1 400px;
        }

        .hero-text h1 {
            font-size: 2.8rem;
            font-weight: 700;
            line-height: 1.2;
            color: #2d2a24;
        }

        .hero-text h1 span {
            color: #b45f2b;
        }

        .hero-text p {
            font-size: 1.15rem;
            color: #4b443b;
            margin: 20px 0 28px;
            max-width: 460px;
        }

        .btn {
            display: inline-block;
            background: #b45f2b;
            color: #fff;
            padding: 14px 38px;
            border-radius: 60px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background: #9e4f20;
        }

        .btn i {
            margin-right: 8px;
        }

        .hero-img {
            flex: 1 1 350px;
            text-align: center;
        }

        .hero-img img {
            width: 100%;
            max-width: 400px;
            border-radius: 32px;
            box-shadow: 0 18px 40px rgba(0,0,0,0.10);
            object-fit: cover;
        }

        
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 12px;
        }

        .section-sub {
            text-align: center;
            color: #5f5549;
            margin-bottom: 40px;
            font-size: 1.05rem;
        }

        .categorias-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 28px;
            margin-bottom: 60px;
        }

        .categoria-card {
            background: #fff;
            padding: 24px 16px 20px;
            border-radius: 28px;
            text-align: center;
            box-shadow: 0 6px 18px rgba(0,0,0,0.04);
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            color: #2d2a24;
            border: 1px solid #f0e8e0;
        }

        .categoria-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 32px rgba(0,0,0,0.08);
        }

        .categoria-card img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            border-radius: 20px;
            margin-bottom: 14px;
            background: #f3ede7;
        }

        .categoria-card h3 {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .categoria-card p {
            font-size: 0.9rem;
            color: #6b5f52;
            margin-top: 4px;
        }

       
        .promos {
            background: #fff5ed;
            padding: 50px 0;
            border-radius: 48px;
            margin-bottom: 60px;
        }

        .promos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .promo-item {
            background: #fff;
            padding: 20px;
            border-radius: 28px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.03);
            border: 1px solid #f0e4d8;
        }

        .promo-item img {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            object-fit: cover;
            background: #efe6dd;
        }

        .promo-item h4 {
            font-weight: 600;
            font-size: 1.05rem;
        }

        .promo-item .precio {
            color: #b45f2b;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .promo-item .precio span {
            text-decoration: line-through;
            color: #a09080;
            font-weight: 400;
            font-size: 0.9rem;
            margin-left: 8px;
        }

       
        .testimonios-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 30px;
            margin: 40px 0 60px;
        }

        .testimonio {
            background: #fff;
            padding: 28px 22px;
            border-radius: 32px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.03);
            border: 1px solid #eee7e0;
        }

        .testimonio i {
            color: #d9772b;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .testimonio p {
            font-style: italic;
            color: #3d362f;
        }

        .testimonio .cliente {
            font-weight: 600;
            margin-top: 14px;
            color: #2d2a24;
        }

        .testimonio .cliente small {
            font-weight: 400;
            color: #7a6c5e;
        }

       
        .contacto {
            background: #f3ede7;
            padding: 50px 0;
            border-radius: 48px;
            margin: 30px 0 50px;
        }

        .contacto-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items: flex-start;
        }

        .contacto-info {
            flex: 1 1 260px;
        }

        .contacto-info h3 {
            font-size: 1.5rem;
            margin-bottom: 16px;
        }

        .contacto-info p {
            margin: 10px 0;
            color: #4b443b;
        }

        .contacto-info i {
            width: 28px;
            color: #b45f2b;
        }

        .contacto-form {
            flex: 2 1 360px;
        }

        .contacto-form input,
        .contacto-form textarea {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #ddd2c6;
            border-radius: 60px;
            font-family: inherit;
            font-size: 1rem;
            margin-bottom: 14px;
            background: #fff;
            outline: none;
            transition: border 0.2s;
        }

        .contacto-form input:focus,
        .contacto-form textarea:focus {
            border-color: #b45f2b;
        }

        .contacto-form textarea {
            border-radius: 24px;
            min-height: 100px;
            resize: vertical;
        }

        .contacto-form .btn {
            width: 100%;
            text-align: center;
        }

        .footer {
            background: #2d2a24;
            color: #d6cec4;
            padding: 40px 0 24px;
            border-radius: 48px 48px 0 0;
            margin-top: 30px;
        }

        .footer .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 30px;
        }

        .footer-col h4 {
            color: #fff;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .footer-col p,
        .footer-col a {
            color: #c5b9ab;
            text-decoration: none;
            display: block;
            margin: 6px 0;
        }

        .footer-col a:hover {
            color: #fff;
        }

        .footer-social a {
            display: inline-block;
            font-size: 1.4rem;
            margin-right: 16px;
            color: #c5b9ab;
        }

        .footer-social a:hover {
            color: #fff;
        }

        .footer-bottom {
            text-align: center;
            border-top: 1px solid #3f3a33;
            padding-top: 24px;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #a39382;
            width: 100%;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .modal-container {
            background: #fff;
            width: 100%;
            max-width: 480px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 30px;
            border-radius: 28px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            position: relative;
            animation: modalFade 0.3s ease;
        }

        @keyframes modalFade {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: #7a6c5e;
        }

        .modal-container h3 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #2d2a24;
        }

        .modal-form input,
        .modal-form select {
            width: 100%;
            padding: 12px 18px;
            border: 1px solid #ddd2c6;
            border-radius: 40px;
            margin-bottom: 14px;
            font-family: inherit;
            outline: none;
            background: #fff;
            font-size: 0.95rem;
        }

        .modal-form input:focus,
        .modal-form select:focus {
            border-color: #b45f2b;
        }

        .modal-form button {
            width: 100%;
            margin-top: 10px;
        }

        .alert-container {
            max-width: 1200px;
            margin: 20px auto 0;
            padding: 0 20px;
        }
        .alert {
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
        }
        .alert-success { background: #e1f5fe; color: #0277bd; border: 1px solid #b3e5fc; }
        .alert-error { background: #ffebee; color: #c62828; border: 1px solid #ffcdd2; }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                gap: 12px;
                padding-top: 20px;
                text-align: center;
            }

            .nav-links.active {
                display: flex;
            }

            .hamburger {
                display: block;
            }

            .hero-text h1 {
                font-size: 2.2rem;
            }

            .hero-img img {
                max-width: 300px;
            }

            .promo-item {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <i class="fas fa-utensils"></i> Artesanails
            </div>
            <ul class="nav-links" id="navLinks">
                <li><a href="#categorias"><i class="fas fa-th-large"></i> Categorías</a></li>
                <li><a href="#promociones"><i class="fas fa-tags"></i> Promos</a></li>
                <li><a href="#testimonios"><i class="fas fa-star"></i> Testimonios</a></li>
                <li><a href="#contacto"><i class="fas fa-envelope"></i> Contacto</a></li>
                
                <?php if (isset($_SESSION['nombre'])): ?>
                    <li>
                        <div class="user-welcome">
                            <i class="fas fa-user-circle" style="color: #b45f2b; font-size: 1.2rem;"></i>
                            <span>Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?></span>
                        </div>
                    </li>
                    <li>
                        <a href="Controller/logout.php" class="nav-btn-logout"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </li>
                <?php else: ?>
                    <li><button class="nav-btn-login" id="openLogin">Iniciar Sesión</button></li>
                    <li><button class="nav-btn-registro" id="openRegister">Registrarse</button></li>
                <?php endif; ?>

            </ul>
            <div class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <div class="alert-container">
        <?php
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo "<div class='alert alert-success'>¡Registro exitoso! Ya puedes iniciar sesión.</div>";
            } elseif ($_GET['status'] == 'error') {
                echo "<div class='alert alert-error'>Hubo un error al registrarse o el documento/correo ya existe.</div>";
            }
        }
        if (isset($_GET['login']) && $_GET['login'] == 'error') {
            echo "<div class='alert alert-error'>Correo o contraseña incorrectos.</div>";
        }
        ?>
    </div>

    <section class="hero">
        <div class="container">
            <div class="hero-text">
                <h1>Sabor <span>y calidad</span> en cada producto</h1>
                <p>Encuentra los mejores embutidos, lácteos, abarrotes y más. ¡Tu despensa de confianza!</p>
                <a href="#categorias" class="btn"><i class="fas fa-shopping-basket"></i> Ver productos</a>
            </div>
            <div class="hero-img">
                <img src="https://picsum.photos/id/292/600/400" alt="Salsamentaria" />
            </div>
        </div>
    </section>

    <section id="categorias" class="container">
        <h2 class="section-title">Nuestras categorías</h2>
        <p class="section-sub">Lo que necesitas para tu mesa, siempre fresco y delicioso.</p>

        <div class="categorias-grid">
            <a href="#" class="categoria-card">
                <img src="https://picsum.photos/id/21/400/400" alt="Embutidos" />
                <h3>Embutidos</h3>
                <p>Jamón, salchichón, chorizo y más</p>
            </a>
            <a href="#" class="categoria-card">
                <img src="https://picsum.photos/id/252/400/400" alt="Lácteos" />
                <h3>Lácteos</h3>
                <p>Quesos, yogures, mantequilla</p>
            </a>
            <a href="#" class="categoria-card">
                <img src="https://picsum.photos/id/264/400/400" alt="Abarrotes" />
                <h3>Abarrotes</h3>
                <p>Arroz, pasta, enlatados, aceite</p>
            </a>
            <a href="#" class="categoria-card">
                <img src="https://picsum.photos/id/30/400/400" alt="Bebidas" />
                <h3>Bebidas</h3>
                <p>Gaseosas, jugos, vinos, cervezas</p>
            </a>
            <a href="#" class="categoria-card">
                <img src="https://picsum.photos/id/26/400/400" alt="Aseo" />
                <h3>Aseo & Hogar</h3>
                <p>Jabones, detergentes, bolsas</p>
            </a>
        </div>
    </section>

    <section id="promociones" class="promos">
        <div class="container">
            <h2 class="section-title"> Promociones especiales</h2>
            <p class="section-sub">Aprovecha estos precios por tiempo limitado.</p>

            <div class="promos-grid">
                <div class="promo-item">
                    <img src="https://picsum.photos/id/101/200/200" alt="Queso" />
                    <div>
                        <h4>Queso campesino</h4>
                        <div class="precio">$8.900 <span>$12.500</span></div>
                    </div>
                </div>
                <div class="promo-item">
                    <img src="https://picsum.photos/id/102/200/200" alt="Jamón" />
                    <div>
                        <h4>Jamón serrano</h4>
                        <div class="precio">$14.200 <span>$18.900</span></div>
                    </div>
                </div>
                <div class="promo-item">
                    <img src="https://picsum.photos/id/103/200/200" alt="Aceite" />
                    <div>
                        <h4>Aceite de oliva</h4>
                        <div class="precio">$22.500 <span>$29.900</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonios" class="container">
        <h2 class="section-title">Lo que dicen nuestros clientes</h2>
        <p class="section-sub">Personas reales, sabores auténticos.</p>

        <div class="testimonios-grid">
            <div class="testimonio">
                <i class="fas fa-quote-left"></i>
                <p>“Siempre encuentro todo lo que necesito para la semana, y el jamón es delicioso.”</p>
                <div class="cliente">— Ana Martínez <small>· Cliente frecuente</small></div>
            </div>
            <div class="testimonio">
                <i class="fas fa-quote-left"></i>
                <p>“La atención es excelente y los precios muy competitivos. 100% recomendado.”</p>
                <div class="cliente">— Carlos Rueda <small>· Vecino del barrio</small></div>
            </div>
            <div class="testimonio">
                <i class="fas fa-quote-left"></i>
                <p>“Me encanta la variedad de quesos y embutidos. ¡Siempre fresco!”</p>
                <div class="cliente">— Laura Gómez <small>· Chef particular</small></div>
            </div>
        </div>
    </section>


    <section id="contacto" class="contacto">
        <div class="container">
            <h2 class="section-title">Contáctanos</h2>
            <p class="section-sub">Escríbenos o visítanos, estaremos encantados de atenderte.</p>

            <div class="contacto-wrapper">
                <div class="contacto-info">
                    <h3><i class="fas fa-store" style="color:#b45f2b;"></i> Salsamentaria El Buen Sabor</h3>
                    <p><i class="fas fa-map-pin"></i> Cra 12 # 34-56, Bogotá</p>
                    <p><i class="fas fa-phone"></i> +57 310 555 1234</p>
                    <p><i class="fas fa-clock"></i> Lun – Sáb: 7:00 am – 8:00 pm</p>
                    <p><i class="fas fa-clock"></i> Dom: 8:00 am – 2:00 pm</p>
                </div>

                <form class="contacto-form">
                    <input type="text" placeholder="Tu nombre" required />
                    <input type="email" placeholder="Correo electrónico" required />
                    <textarea placeholder="¿Qué productos buscas?"></textarea>
                    <button type="submit" class="btn"><i class="fas fa-paper-plane"></i> Enviar mensaje</button>
                </form>
            </div>
        </div>
    </section>

 
    <footer class="footer">
        <div class="container">
            <div class="footer-col">
                <h4><i class="fas fa-utensils"></i> El Buen Sabor</h4>
                <p>Tu salsamentaria de confianza con los mejores productos para tu mesa.</p>
            </div>
            <div class="footer-col">
                <h4>Enlaces rápidos</h4>
                <a href="#categorias">Categorías</a>
                <a href="#promociones">Promociones</a>
                <a href="#testimonios">Testimonios</a>
            </div>
            <div class="footer-col">
                <h4>Contacto</h4>
                <p><i class="fas fa-phone"></i> +57 310 555 1234</p>
                <p><i class="fas fa-envelope"></i> info@elbuensabor.co</p>
            </div>
            <div class="footer-col footer-social">
                <h4>Síguenos</h4>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
            <div class="footer-bottom">
                &copy; 2026 Salsamentaria El Buen Sabor – Todos los derechos reservados.
            </div>
        </div>
    </footer>


    <div class="modal-overlay" id="modalLogin">
        <div class="modal-container">
            <button class="modal-close" id="closeLogin"><i class="fas fa-times"></i></button>
            <h3>Iniciar Sesión</h3>
            <form action="Controller/login.php" method="POST" class="modal-form">
                <input type="email" name="correo" placeholder="Correo electrónico" required />
                <input type="password" name="password" placeholder="Contraseña" required />
                <button type="submit" class="btn">Entrar</button>
            </form>
        </div>
    </div>

  
    <div class="modal-overlay" id="modalRegister">
        <div class="modal-container">
            <button class="modal-close" id="closeRegister"><i class="fas fa-times"></i></button>
            <h3>Crear Cuenta</h3>
            <form action="Controller/registro.php" method="POST" class="modal-form">
                <input type="text" name="nombre" placeholder="Nombre" required />
                <input type="text" name="apellido" placeholder="Apellido" required />
                
                <select name="tipo_identidad" required>
                    <option value="" disabled selected>Seleccione tipo de identidad</option>
                    <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                    <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                    <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>

                <input type="text" name="numero_identidad" placeholder="Número de identidad" required />
                <input type="tel" name="telefono" placeholder="Teléfono" required />
                <input type="email" name="correo" placeholder="Correo electrónico" required />
                <input type="password" name="password" placeholder="Contraseña (sin encriptar)" required />
                
                <button type="submit" name="registrar" class="btn">Registrarse</button>
            </form>
        </div>
    </div>

   
    <script>
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

        const modalLogin = document.getElementById('modalLogin');
        const openLogin = document.getElementById('openLogin');
        const closeLogin = document.getElementById('closeLogin');

        const modalRegister = document.getElementById('modalRegister');
        const openRegister = document.getElementById('openRegister');
        const closeRegister = document.getElementById('closeRegister');

        if (openLogin) {
            openLogin.addEventListener('click', () => { modalLogin.style.display = 'flex'; });
            closeLogin.addEventListener('click', () => { modalLogin.style.display = 'none'; });
        }

        if (openRegister) {
            openRegister.addEventListener('click', () => { modalRegister.style.display = 'flex'; });
            closeRegister.addEventListener('click', () => { modalRegister.style.display = 'none'; });
        }

        window.addEventListener('click', (e) => {
            if (e.target === modalLogin) modalLogin.style.display = 'none';
            if (e.target === modalRegister) modalRegister.style.display = 'none';
        });
    </script>

</body>
</html>