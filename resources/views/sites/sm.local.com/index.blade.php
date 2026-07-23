<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SM Meble Na Wymiar</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <style>
        /* ==========================================================================
           1. RESET, ZMIENNE I STYLE GLOBALNE
           ========================================================================== */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bg-color: #f4f6f9;
            --text-color: #141d26;
            --accent-color: #c5a880;
            --accent-dark: #a68658;
            --white: #ffffff;
            --navy-dark: #141d26; /* Dopasowane do tła logo */
            --dark-overlay: rgba(20, 29, 38, 0.85);
            --font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            --transition-speed: 0.4s;
        }

        body {
            font-family: var(--font-family);
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        .section-padding {
            padding: 100px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 32px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 50px;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background: var(--accent-color);
            margin: 15px auto 0;
            transition: width var(--transition-speed) ease;
        }

        .container:hover .section-title::after {
            width: 80px;
        }

        .section-subtitle-center {
            text-align: center;
            max-width: 650px;
            margin: -30px auto 40px auto;
            color: #666;
        }

        .btn-main {
            display: inline-block;
            padding: 12px 35px;
            background-color: var(--accent-color);
            color: var(--white);
            text-decoration: none;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 2px;
            font-weight: 600;
            transition: background-color var(--transition-speed);
            border: none;
            cursor: pointer;
        }

        .btn-main:hover {
            background-color: var(--accent-dark);
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* ==========================================================================
           2. NAWIGACJA (HEADER)
           ========================================================================== */
        header {
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 110px;
            background-color: #1d242e; /* Dokładny kolor tła z logo */
            backdrop-filter: blur(15px);
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 0 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header-container {
            /* Usuwamy display: table-cell */
            width: 100%;
            display: flex;
            justify-content: space-between; /* Rozsuwa logo i hamburger na brzegi */
            align-items: center; /* Wyrównuje elementy w pionie */
        }

        .logo-area {
            /*float: left;*/
        }

        .logo-area a {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 22px;
            font-weight: 700;
            text-decoration: none;
            color: var(--text-color);
            letter-spacing: 2px;
        }

        .logo-img {
            height: 100px;
            width: auto;
            display: block;
        }

        .logo-area span {
            color: var(--accent-color);
        }

        .desktop-nav {
            margin-left: auto;
            /*float: right;*/
            /*margin-top: 5px;*/
        }

        .desktop-nav ul {
            list-style: none;
        }

        .desktop-nav ul li {
            display: inline-block;
            margin-left: 30px;
        }

        .desktop-nav ul li a {
            text-decoration: none;
            color: var(--white); /* Zmiana na biały, by tekst był widoczny na ciemnym nagłówku */
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: color var(--transition-speed);
        }

        .desktop-nav ul li a:hover {
            color: var(--accent-color);
        }

        /* Mobilne Menu Trigger */
        .hamburger {
            display: none;
            float: right;
            background: none;
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 2000;
            position: relative;
            margin-top: -5px;
        }

        .hamburger .bar {
            display: block;
            width: 25px;
            height: 2px;
            margin: 5px auto;
            background-color: var(--accent-color);
            transition: all var(--transition-speed) ease-in-out;
        }

        .mobile-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(20, 20, 20, 0.96);
            backdrop-filter: blur(10px);
            z-index: 1500;
            opacity: 0;
            visibility: hidden;
            transition: opacity var(--transition-speed), visibility var(--transition-speed);
            display: table;
            text-align: center;
        }

        .mobile-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .mobile-menu-wrap {
            display: table-cell;
            vertical-align: middle;
        }

        .mobile-nav-links {
            list-style: none;
        }

        .mobile-nav-links li {
            padding: 20px 0;
            transform: translateY(20px);
            opacity: 0;
            transition: transform var(--transition-speed), opacity var(--transition-speed);
        }

        .mobile-overlay.active .mobile-nav-links li {
            transform: translateY(0);
            opacity: 1;
        }

        .mobile-overlay.active .mobile-nav-links li:nth-child(1) {
            transition-delay: 0.1s;
        }

        .mobile-overlay.active .mobile-nav-links li:nth-child(2) {
            transition-delay: 0.2s;
        }

        .mobile-overlay.active .mobile-nav-links li:nth-child(3) {
            transition-delay: 0.3s;
        }

        .mobile-overlay.active .mobile-nav-links li:nth-child(4) {
            transition-delay: 0.4s;
        }

        .mobile-overlay.active .mobile-nav-links li:nth-child(5) {
            transition-delay: 0.5s;
        }

        .mobile-nav-links li a {
            font-size: 28px;
            font-weight: 300;
            color: var(--white);
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 3px;
            transition: color 0.3s;
        }

        .mobile-nav-links li a:hover {
            color: var(--accent-color);
        }

        .hamburger.active .bar:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active .bar:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
            background-color: var(--white);
        }

        .hamburger.active .bar:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
            background-color: var(--white);
        }

        /* ==========================================================================
           3. HERO SLIDER
           ========================================================================== */
        .hero {
            width: 100%;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .hero .swiper-slide {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
        }

        .hero-content {
            text-align: center;
            color: #fff;
            z-index: 2;
        }

        .hero .swiper-pagination.swiper-pagination-bullets {
            position: absolute !important;
            right: 30px !important;
            left: auto !important;
            top: 50% !important;
            bottom: auto !important;
            transform: translateY(-50%) !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 12px !important;
            z-index: 9999 !important;
            width: auto !important;
        }

        .hero .swiper-pagination-bullet {
            width: 12px !important;
            height: 12px !important;
            background-color: #fff !important;
            opacity: 0.5 !important;
            transition: all 0.3s ease !important;
            border-radius: 50% !important;
            margin: 0 !important;
            cursor: pointer !important;
        }

        .hero .swiper-pagination-bullet-active {
            opacity: 1 !important;
            background-color: var(--accent-color) !important;
            transform: scale(1.3) !important;
        }

        .hero-logo {
            width: 320px;
            height: auto;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 52px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 6px;
            margin-bottom: 10px;
        }

        .hero h1 span {
            font-weight: 700;
            color: var(--accent-color);
        }

        .hero p {
            font-size: 18px;
            letter-spacing: 2px;
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ==========================================================================
           4. PRACOWNIA (ABOUT)
           ========================================================================== */
        .about-grid {
            width: 100%;
            display: table;
        }

        .about-col {
            display: table-cell;
            width: 50%;
            vertical-align: middle;
            padding: 20px;
        }

        .about-text h3 {
            font-size: 24px;
            margin-bottom: 20px;
            color: var(--accent-dark);
        }

        .about-text p {
            margin-bottom: 15px;
            color: #555;
            font-size: 16px;
        }

        .about-img img {
            width: 100%;
            height: auto;
            border-radius: 2px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
        }

        /* ==========================================================================
           5. USŁUGI (SERVICES GALLERY)
           ========================================================================== */
        .portfolio-section {
            background-color: var(--white);
        }

        .gallery-grid {
            clear: both;
            margin-top: 30px;
        }

        .gallery-item {
            float: left;
            width: 50%;
            padding: 10px;
            position: relative;
            overflow: hidden;
            height: 280px;
        }

        .gallery-item-inner {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(43, 43, 43, 0.55);
            opacity: 1;
            transition: opacity var(--transition-speed);
            display: table;
            text-align: center;
        }

        .gallery-overlay-content {
            display: table-cell;
            vertical-align: middle;
            color: var(--white);
            padding: 20px;
        }

        .gallery-overlay-content h4 {
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .gallery-overlay-content p {
            font-size: 13px;
            color: var(--accent-color);
        }

        .gallery-item-inner:hover img {
            transform: scale(1.1);
        }

        .gallery-item-inner:hover .gallery-overlay {
            opacity: 1;
        }

        /* ==========================================================================
           6. PROCES (TIMELINE)
           ========================================================================== */
        .philosophy-section {
            background-color: #e9ecf2;
            text-align: center;
        }

        .timeline {
            position: relative;
            padding: 20px 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: rgba(15, 26, 44, 0.1);
            z-index: 1;
        }

        .timeline-progress {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 0%;
            background: var(--accent-color);
            z-index: 2;
            transition: height 0.6s ease-out;
            box-shadow: 0 0 8px rgba(197, 168, 128, 0.5);
        }

        .timeline-item {
            position: relative;
            margin-bottom: 80px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-dot {
            position: absolute;
            left: 50%;
            transform: translate(-50%, -50%);
            top: 50%;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--bg-color);
            border: 3px solid rgba(15, 26, 44, 0.2);
            z-index: 3;
            transition: all var(--transition-speed) ease;
        }

        .timeline-item.active .timeline-dot {
            border-color: var(--accent-color);
            background: var(--navy-dark);
            box-shadow: 0 0 0 6px rgba(197, 168, 128, 0.2);
        }

        .timeline-content {
            width: 44%;
            padding: 35px;
            background: var(--white);
            border-radius: 4px;
            box-shadow: 0 10px 30px rgba(10, 17, 30, 0.04);
            position: relative;
            opacity: 0;
            transition: all 0.7s cubic-bezier(0.25, 1, 0.5, 1);
            text-align: left;
        }

        .timeline-item:nth-child(odd) .timeline-content {
            transform: translateX(-50px);
        }

        .timeline-item:nth-child(even) .timeline-content {
            transform: translateX(50px);
        }

        .timeline-item.active .timeline-content {
            opacity: 1;
            transform: translateX(0);
        }

        .timeline-content:hover {
            box-shadow: 0 20px 40px rgba(10, 17, 30, 0.08);
            transform: translateY(-5px) !important;
        }

        .timeline-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: var(--accent-color);
            transition: width var(--transition-speed) ease;
        }

        .timeline-content:hover::before {
            width: 100%;
        }

        .step-number {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--accent-color);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
            display: block;
        }

        .timeline-content h3 {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--navy-dark);
            margin-bottom: 15px;
            letter-spacing: 0.5px;
        }

        .timeline-content p {
            font-size: 0.95rem;
            color: var(--text-color);
            opacity: 0.85;
            font-weight: 300;
        }

        /* ==========================================================================
           7. PORTFOLIO / REALIZACJE
           ========================================================================== */
        .realizacje-section {
            padding: 60px 40px 100px 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .realizacje-grid {
            clear: both;
        }

        .realizacja-card {
            float: left;
            width: 33.333%;
            padding: 15px;
            margin-bottom: 20px;
        }

        .realizacja-card-inner {
            background-color: var(--white);
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .realizacja-card-inner:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
        }

        .card-img-wrap {
            width: 100%;
            height: 260px;
            overflow: hidden;
            position: relative;
        }

        .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .realizacja-card-inner:hover .card-img-wrap img {
            transform: scale(1.05);
        }

        .card-info {
            padding: 20px;
            text-align: center;
            border-top: 1px solid #f0ede6;
        }

        .card-info h3 {
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-color);
            margin-bottom: 5px;
        }

        .card-info p {
            font-size: 13px;
            color: var(--accent-dark);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Modale Galeryjne (Poziom 1) */
        .lightbox-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(20, 20, 20, 0.98);
            z-index: 3000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
            overflow-y: auto;
            padding: 60px 20px;
        }

        .lightbox-modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-close {
            position: fixed;
            top: 30px;
            right: 40px;
            background: none;
            border: none;
            color: var(--white);
            font-size: 36px;
            cursor: pointer;
            z-index: 3100;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: var(--accent-color);
        }

        .modal-content-wrap {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .modal-title-area {
            color: var(--white);
            margin-bottom: 40px;
        }

        .modal-title-area h2 {
            font-size: 28px;
            font-weight: 300;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 5px;
        }

        .modal-title-area p {
            color: var(--accent-color);
            font-size: 14px;
            letter-spacing: 1px;
        }

        .modal-gallery-grid {
            clear: both;
        }

        .modal-gallery-item {
            float: left;
            width: 50%;
            padding: 10px;
            height: 380px;
            cursor: pointer;
            position: relative;
        }

        .modal-gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 2px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .modal-gallery-item::after {
            content: "POWIĘKSZ ＋";
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            background-color: rgba(191, 161, 127, 0.7);
            color: var(--white);
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 2px;
        }

        .modal-gallery-item:hover::after {
            opacity: 1;
        }

        /* Pełny ekran pojedynczego zdjęcia (Poziom 2) */
        .single-photo-lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(10, 10, 10, 0.99);
            z-index: 4000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
            padding: 40px;
        }

        .single-photo-lightbox.active {
            opacity: 1;
            visibility: visible;
        }

        .single-photo-wrap {
            position: relative;
            max-width: 90%;
            max-height: 85vh;
        }

        .single-photo-wrap img {
            max-width: 100%;
            max-height: 85vh;
            display: block;
            border-radius: 2px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6);
        }

        .single-photo-close {
            position: absolute;
            top: -50px;
            right: 0;
            background: none;
            border: none;
            color: var(--white);
            font-size: 40px;
            cursor: pointer;
            transition: color 0.2s;
        }

        .single-photo-close:hover {
            color: var(--accent-color);
        }
        /* Style dla strzałek nawigacji w pełnym ekranie zdjęcia */
        .photo-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(20, 20, 20, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--white);
            font-size: 24px;
            width: 50px;
            height: 50px;
            cursor: pointer;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s, color 0.2s;
            z-index: 4100;
        }

        .photo-nav-btn:hover {
            background-color: var(--accent-color);
            color: var(--white);
        }

        .photo-prev-btn {
            left: -70px;
        }

        .photo-next-btn {
            right: -70px;
        }

        /* Responsywność dla strzałek na małych ekranach */
        @media (max-width: 768px) {
            .photo-nav-btn {
                width: 40px;
                height: 40px;
                font-size: 18px;
                background: rgba(20, 20, 20, 0.8);
            }
            .photo-prev-btn { left: 10px; }
            .photo-next-btn { right: 10px; }
        }
        /* ==========================================================================
           8. KONTAKT & STOPKA
           ========================================================================== */
        .contact-section {
            background-color: var(--navy-dark);
            color: var(--white);
        }

        .contact-section .section-title {
            color: var(--white);
        }

        .contact-grid {
            display: table;
            width: 100%;
        }

        .contact-col {
            display: table-cell;
            width: 50%;
            vertical-align: top;
            padding: 20px;
        }

        .contact-info p {
            margin-bottom: 15px;
            font-size: 15px;
            color: #ccc;
        }

        .contact-info strong {
            color: var(--white);
            display: block;
            margin-bottom: 5px;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 12px;
            background-color: #141f32;
            border: 1px solid #1f2f4a;
            color: var(--white);
            margin-bottom: 15px;
            font-family: var(--font-family);
        }

        .contact-form input:focus, .contact-form textarea:focus {
            outline: none;
            border-color: var(--accent-color);
        }

        footer {
            background-color: #060b13;
            color: #6c7a90;
            text-align: center;
            padding: 30px 20px;
            font-size: 13px;
            border-top: 1px solid #141f32;
        }

        /* ==========================================================================
           9. RESPONSIVE WEB DESIGN (RWD)
           ========================================================================== */
        @media (max-width: 992px) {
            .realizacja-card {
                width: 50%;
            }

            .modal-gallery-item {
                width: 50%;
                height: 280px;
            }

            .gallery-item {
                width: 50%;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 0 20px;
            }

            .desktop-nav {
                display: none;
            }

            .hamburger {
                display: block;
            }

            .realizacja-card {
                width: 100%;
                float: none;
            }

            .modal-gallery-item {
                width: 100%;
                float: none;
                height: 230px;
            }

            .modal-close {
                top: 15px;
                right: 20px;
                font-size: 30px;
            }

            .about-col {
                display: block;
                width: 100%;
                padding: 10px 0;
            }

            .gallery-item {
                width: 100%;
                height: 320px;
                float: none;
            }

            .contact-col {
                display: block;
                width: 100%;
                padding: 10px 0;
            }

            .hero h1 {
                font-size: 34px;
            }

            /* RWD Osi czasu */
            .timeline::before, .timeline-progress {
                left: 15px;
                transform: none;
            }

            .timeline-item {
                flex-direction: column !important;
                align-items: flex-start;
                margin-bottom: 50px;
            }

            .timeline-dot {
                left: 15px;
                transform: translate(-50%, -50%);
                top: 30px;
            }

            .timeline-content {
                width: calc(100% - 40px);
                margin-left: 40px;
                padding: 25px;
                transform: translateY(30px) !important;
            }

            .timeline-item.active .timeline-content {
                transform: translateY(0) !important;
            }
            .hero-logo {
                width: 150px; /* Zmniejszenie z 320px */
                margin-top: 40px; /* Większy margines od góry */
                margin-bottom: 20px;
            }
        }
        /* ==========================================================================
           10. KOMUNIKAT COOKIES (POPRAWIONY DLA POZYCJI NA MOBILE)
           ========================================================================== */
        .cookie-banner {
            position: fixed;
            bottom: -150px; /* Większy zapas na schowanie na starcie */
            left: 0;
            width: 100%;
            background-color: var(--navy-dark);
            color: var(--white);
            padding: 20px 40px;
            z-index: 5000;
            box-shadow: 0 -5px 25px rgba(0, 0, 0, 0.2);
            border-top: 2px solid var(--accent-color);
            transition: bottom 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .cookie-banner.active {
            bottom: 0;
        }

        .cookie-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
        }

        .cookie-container p {
            font-size: 14px;
            font-weight: 300;
            line-height: 1.5;
            opacity: 0.9;
        }

        .cookie-container a {
            color: var(--accent-color);
            text-decoration: underline;
            transition: color 0.3s;
        }

        .cookie-container a:hover {
            color: var(--accent-dark);
        }

        .btn-cookie {
            padding: 8px 25px;
            font-size: 12px;
            white-space: nowrap;
        }

        /* Dostosowanie do urządzeń mobilnych - zamiana w bezpieczną "pływającą" kartę */
        @media (max-width: 768px) {
            .cookie-banner {
                left: 20px;
                right: 20px;
                width: calc(100% - 40px); /* Odliczamy marginesy boczne */
                bottom: -250px; /* Głębokie schowanie na starcie */
                border-radius: 8px; /* Zaokrąglone rogi dla wyglądu karty */
                border: 1px solid var(--accent-color); /* Ramka dookoła zamiast tylko u góry */
                padding: 20px;
            }

            /* Pozycja po aktywacji - uniesiona o 30px nad dolną krawędź ekranu */
            .cookie-banner.active {
                bottom: 30px; /* <--- To unosi komunikat nad systemowe paski nawigacji */
            }

            .cookie-container {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }

            .btn-cookie {
                width: 100%;
                padding: 12px 25px; /* Nieco większy przycisk, łatwiejszy do kliknięcia palcem */
            }
        }
    </style>
</head>
<body>

<header>
    <div class="header-container clearfix">
        <div class="logo-area">
            <a href="#hero-target">
                <img src="{{ asset('storage/logo-sm.png') }}" alt="Logo" class="logo-img">
{{--                <span>MEBLE NA WYMIAR</span>--}}
            </a>
        </div>

        <nav class="desktop-nav">
            <ul>
                <li><a href="#pracownia">O nas</a></li>
                <li><a href="#projekty">Usługi</a></li>
                <li><a href="#realizacje">Realizacje</a></li>
                <li><a href="#kontakt">Kontakt</a></li>
            </ul>
        </nav>

        <button class="hamburger" id="hamburger-btn" aria-label="Menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
</header>

<div class="mobile-overlay" id="mobile-menu">
    <div class="mobile-menu-wrap">
        <ul class="mobile-nav-links">
            <li><a href="#pracownia">O nas</a></li>
            <li><a href="#projekty">Usługi</a></li>
            <li><a href="#realizacje">Realizacje</a></li>
            <li><a href="#kontakt">Kontakt</a></li>
        </ul>
    </div>
</div>

<div id="hero-target"></div>

<section class="hero swiper heroSwiper">
    <div class="swiper-wrapper">
        @foreach($heroImages as $image)
            @php
                $bgImage = asset('storage/'. $image);
            @endphp
            <div class="swiper-slide"
                 style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ $bgImage }}');">
                <div class="hero-content">
                    <img src="{{ asset('storage/raty.png') }}" class="hero-logo" alt="Logo">
                    <h1>{!! $settings['hero_title'] ?? 'projekt <span>i...</span>' !!}</h1>
                    <p>{!! $settings['hero_subtitle'] ?? 'Ponad 20 lat pasji...' !!}</p>
                    <a href="#kontakt" class="btn-main">Zamów i skorzystaj</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</section>

<section id="pracownia" class="section-padding">
    <h2 class="section-title">{!! $settings['about_heading'] !!}</h2>
    <div class="about-grid clearfix">
        <div class="about-col about-text">
            {!! $settings['about_content'] !!}
        </div>
        <div class="about-col about-img">
            @if($settings['about_image'])
                <div class="mb-8 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $settings['about_image']) }}" alt="Pracownia projektowa">
                </div>
            @endif
        </div>
    </div>
</section>

<section id="projekty" class="portfolio-section section-padding">
    <h2 class="section-title">Nasze usługi</h2>
    <p class="section-subtitle-center">Tworzymy meble, które idealnie wpisują się w przestrzeń Twojego domu.</p>

    <div class="gallery-grid clearfix">
        <div class="gallery-item">
            <div class="gallery-item-inner">
                <img src={{asset('storage/ofer/kuchnia.jpg')}}
                     alt="Kuchnia">
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <h4>Kuchnie na wymiar</h4>
                        <p>Projekt nowoczesnego pokoju dziennego</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery-item">
            <div class="gallery-item-inner">
                <img src={{asset('storage/ofer/szafa.jpg')}}
                     alt="Szafa">
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <h4>Szafy i garderoby</h4>
                        <p>Przytulna strefa wypoczynku z unikalnym łóżkiem</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery-item">
            <div class="gallery-item-inner">
                <img src={{asset('storage/ofer/lazienka.jpg')}}
                     alt="Łazienka">
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <h4>Meble łazienkowe</h4>
                        <p>Połączenie ergonomii z odważnymi kolorami</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="gallery-item">
            <div class="gallery-item-inner">
                <img src={{asset('storage/ofer/niestandard.jpg')}}
                     alt="Niestandardowe">
                <div class="gallery-overlay">
                    <div class="gallery-overlay-content">
                        <h4>Realizacje niestandardowe</h4>
                        <p>Projekt nowoczesnego pokoju dziennego</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="philosophy-section section-padding">
    <div class="container">
        <h2 class="section-title">Jak działamy?</h2>
        <div class="timeline">
            <div class="timeline-progress" id="progress-bar"></div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="step-number">Krok 1</span>
                    <h3>Pomiar i konsultacja</h3>
                    <p>Przyjedziemy, dokładnie zmierzymy przestrzeń i wysłuchamy Twoich potrzeb.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="step-number">Krok 2</span>
                    <h3>Projekt i doradztwo</h3>
                    <p>Pomożemy dobrać materiały (fronty lakierowane, akrylowe, formirowane, lakierowane oraz różnego typu blaty) i stworzymy funkcjonalny projekt.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="step-number">Krok 3</span>
                    <h3>Produkcja</h3>
                    <p>Z precyzją i dbałością o detale wyprodukujemy Twoje meble w naszym warsztacie.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="step-number">Krok 4</span>
                    <h3>Montaż</h3>
                    <p>Sprawnie i czysto zamontujemy meble w Twoim domu.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="realizacje" class="portfolio-section section-padding">
    <h2 class="section-title">Realizacje (Nasze Portfolio)</h2>
    <p class="section-subtitle-center" style="margin-top: -30px; font-weight: bold;">Zobacz, jak odmieniamy wnętrza
        naszych klientów</p>

    <div class="realizacje-grid clearfix">
        @foreach($gallery as $galleryItem)
            <div class="realizacja-card" onclick="openGallery('{{$galleryItem['slug']}}')">
                <div class="realizacja-card-inner">
                    <div class="card-img-wrap">
                        <img
                            src="{{ $galleryItem['images'][0] }}"
                            alt="Warszawa">
                    </div>
                    <div class="card-info">
                        <h3>{{ $galleryItem['title'] }}</h3>
                        <p>{{ Str::limit($galleryItem['subtitle'], 100, '...') }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="lightbox-modal" id="gallery-lightbox">
        <button class="modal-close" onclick="closeGallery()">&times;</button>
        <div class="modal-content-wrap">
            <div class="modal-title-area">
                <h2 id="lightbox-title">Nazwa Realizacji</h2>
                <p id="lightbox-subtitle">Kategoria</p>
            </div>
            <div class="modal-gallery-grid clearfix" id="lightbox-images-container"></div>
        </div>
    </div>

    <div id="photo-lightbox" class="single-photo-lightbox">
        <div class="single-photo-wrap">
            <button class="single-photo-close" onclick="closePhotoView()">&times;</button>

            <button class="photo-nav-btn photo-prev-btn" onclick="navigatePhoto(-1)">&lsaquo;</button>
            <button class="photo-nav-btn photo-next-btn" onclick="navigatePhoto(1)">&rsaquo;</button>

            <img src="" id="target-lightbox-img" alt="Powiększone zdjęcie">
        </div>
    </div>
</section>

<section id="kontakt" class="contact-section section-padding">
    <h2 class="section-title">Kontakt</h2>
    <div class="contact-grid clearfix">
        <div class="contact-col contact-info">
            <p><strong>Adres:</strong> {{ $settings['contact_address'] }}</p>
            <p><strong>Telefon:</strong> {{ $settings['contact_phone'] }}</p>
            <p><strong>Email:</strong> {{ $settings['contact_email'] }}</p>
        </div>
        <div class="contact-col contact-form">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Imię i nazwisko</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="phone">Telefon (opcjonalnie)</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
                </div>

                <div>
                    <label for="message">Wiadomość</label>
                    <textarea name="message" id="message" rows="5" required>{{ old('message') }}</textarea>
                    @error('message') <span class="error">{{ $message }}</span> @enderror
                </div>

                {{-- honeypot – ukryte pole przeciwko botom --}}
                <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off">

                <button type="submit" class="btn-main" style="width: 100%;">Wyślij Zapytanie</button>
            </form>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2026 SM Meble na wymiar | Wszystkie prawa zastrzeżone.</p>
</footer>
<div id="gallery-lightbox" class="lightbox-modal">
    <button class="modal-close" id="close-lightbox-btn">&times;</button>
    <div class="modal-content-wrap">
        <div class="modal-title-area">
            <h2 id="lightbox-title">Tytuł projektu</h2>
            <p id="lightbox-subtitle">Podtytuł projektu</p>
        </div>
        <div id="lightbox-images-container" class="modal-gallery-grid clearfix">
        </div>
    </div>
</div>

{{--<div id="photo-lightbox" class="single-photo-lightbox">--}}
{{--    <div class="single-photo-wrap">--}}
{{--        <button class="single-photo-close" onclick="closePhotoView()">&times;</button>--}}

{{--        <button class="photo-nav-btn photo-prev-btn" onclick="navigatePhoto(-1)">&lsaquo;</button>--}}
{{--        <button class="photo-nav-btn photo-next-btn" onclick="navigatePhoto(1)">&rsaquo;</button>--}}

{{--        <img src="" id="target-lightbox-img" alt="Powiększone zdjęcie">--}}
{{--    </div>--}}
{{--</div>--}}

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    /* ==========================================================================
       JS MODULE 1: INICJACJA SWIPER HERO SLIDER
       ========================================================================== */
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".heroSwiper", {
            direction: "horizontal",
            loop: true,
            effect: "fade",
            fadeEffect: {crossFade: true},
            autoplay: {delay: 5000, disableOnInteraction: false},
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                modifierClass: "swiper-pagination-",
            },
        });
    });

    /* ==========================================================================
       JS MODULE 2: OBSŁUGA MOBILNEGO MENU (HAMBURGER)
       ========================================================================== */
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileLinks = document.querySelectorAll('.mobile-nav-links a');

    function toggleMenu() {
        hamburgerBtn.classList.toggle('active');
        mobileMenu.classList.toggle('active');
        document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : 'auto';
    }

    hamburgerBtn.addEventListener('click', toggleMenu);
    mobileLinks.forEach(link => link.addEventListener('click', () => mobileMenu.classList.contains('active') && toggleMenu()));

    /* ==========================================================================
       JS MODULE 3: ANIMACJA LINII CZASU (TIMELINE)
       ========================================================================== */
    document.addEventListener('DOMContentLoaded', () => {
        const timelineItems = document.querySelectorAll('.timeline-item');
        const progressBar = document.getElementById('progress-bar');

        const animateTimeline = () => {
            const triggerBottom = window.innerHeight * 0.85;
            let activeCount = 0;

            timelineItems.forEach((item, index) => {
                if (item.getBoundingClientRect().top < triggerBottom) {
                    item.classList.add('active');
                    activeCount = index + 1;
                } else {
                    item.classList.remove('active');
                }
            });

            if (activeCount > 0) {
                progressBar.style.height = `${((activeCount - 1) / (timelineItems.length - 1)) * 100}%`;
            } else {
                progressBar.style.height = '0%';
            }
        };

        window.addEventListener('scroll', animateTimeline);
        animateTimeline();
    });

    /* ==========================================================================
       JS MODULE 4: REPOZYTORIUM ZDJĘĆ I OBSŁUGA DYNAMICZNEJ GALERII (MODAL)
       ========================================================================== */
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    // Funkcja Quintic Ease-Out: daje ekstremalnie płynne i widoczne wyhamowanie na końcu
    function easeOutQuint(t) {
        return 1 + (--t) * t * t * t * t;
    }

    // Wymuszona i precyzyjna kontrola przewijania
    function forceSmoothScroll(targetY, duration = 1400) { // Wydłużyliśmy czas do 1400ms, aby efekt hamowania był bardzo zauważalny
        const startY = window.pageYOffset || document.documentElement.scrollTop;
        const difference = targetY - startY;
        const startTime = performance.now();

        function step(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1); // Maksymalnie 1 (100%)

            // Obliczamy pozycję z użyciem zaawansowanego hamowania
            const easeProgress = easeOutQuint(progress);
            window.scrollTo(0, startY + (difference * easeProgress));

            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        }

        window.requestAnimationFrame(step);
    }

    // Przechwycenie kliknięć w menu z całkowitym zablokowaniem domyślnego skoku
    document.querySelectorAll('.scroll-link').forEach(link => {
        link.addEventListener('click', function (e) {
            // To kluczowe – mówimy przeglądarce: "Nie dotykaj tego, my przewijamy ręcznie"
            e.preventDefault();
            e.stopPropagation();

            if (mobileMenu.classList.contains('active')) {
                toggleMenu();
            }

            const targetId = this.getAttribute('href');

            // Obsługa powrotu do góry przez link z loga (#hero-target)
            if (targetId === '#hero-target') {
                forceSmoothScroll(0, 1400);
                return;
            }

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const offset = 80; // wysokość menu
                const elementPosition = targetElement.getBoundingClientRect().top + (window.pageYOffset || document.documentElement.scrollTop);
                const offsetPosition = elementPosition - offset;

                forceSmoothScroll(offsetPosition, 1400);
            }
        });
    });
    const galleryData = @json($gallery);

    const lightbox = document.getElementById('gallery-lightbox');
    const lbTitle = document.getElementById('lightbox-title');
    const lbSubtitle = document.getElementById('lightbox-subtitle');
    const lbContainer = document.getElementById('lightbox-images-container');
    const photoLightbox = document.getElementById('photo-lightbox');
    const targetLightboxImg = document.getElementById('target-lightbox-img');

    function openGallery(key) {
        const project = galleryData[key];
        if (!project) return;

        lbTitle.innerText = project.title;
        lbSubtitle.innerText = project.subtitle;

        // Zapisujemy tablicę zdjęć bieżącego projektu do zmiennej globalnej
        currentProjectImages = project.images;

        let htmlContent = '';
        project.images.forEach((url, index) => {
            // Przekazujemy index zdjęcia do funkcji otwierającej
            htmlContent += `
                <div class="modal-gallery-item" onclick="openPhotoView(${index})">
                    <img src="${url}" alt="${project.title}">
                </div>
            `;
        });
        lbContainer.innerHTML = htmlContent;

        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeGallery() {
        lightbox.classList.remove('active');
        if (!mobileMenu.classList.contains('active')) {
            document.body.style.overflow = 'auto';
        }
    }

    // ZMIENIONA FUNKCJA: Teraz przyjmuje index zamiast czystego URLa
    function openPhotoView(index) {
        currentImageIndex = index;
        updateLightboxImage();
        photoLightbox.classList.add('active');
    }

    // NOWA FUNKCJA: Aktualizuje źródło obrazka na podstawie aktualnego indexu
    function updateLightboxImage() {
        if (currentProjectImages.length > 0) {
            targetLightboxImg.src = currentProjectImages[currentImageIndex];
        }
    }

    // NOWA FUNKCJA: Przewijanie w lewo (-1) lub w prawo (1) w pętli
    function navigatePhoto(direction) {
        if (currentProjectImages.length === 0) return;

        currentImageIndex += direction;

        // Zapętlenie galerii (jeśli wyjdziemy poza zakres)
        if (currentImageIndex >= currentProjectImages.length) {
            currentImageIndex = 0; // Wróć do pierwszego
        } else if (currentImageIndex < 0) {
            currentImageIndex = currentProjectImages.length - 1; // Przejdź do ostatniego
        }

        updateLightboxImage();
    }

    function closePhotoView() {
        photoLightbox.classList.remove('active');
    }

    // BONUS: Obsługa strzałek na klawiaturze (lewo / prawo / esc) dla wygody
    document.addEventListener('keydown', function(e) {
        if (!photoLightbox.classList.contains('active')) return;

        if (e.key === 'ArrowRight') {
            navigatePhoto(1);
        } else if (e.key === 'ArrowLeft') {
            navigatePhoto(-1);
        } else if (e.key === 'Escape') {
            closePhotoView();
        }
    });
</script>
<script>
    /* ==========================================================================
       JS MODULE 5: OBSŁUGA PLIKÓW COOKIES
       ========================================================================== */
    document.addEventListener("DOMContentLoaded", function () {
        const cookieBanner = document.getElementById('cookie-banner');
        const acceptBtn = document.getElementById('accept-cookies');

        // Sprawdź, czy użytkownik już zaakceptował cookies
        if (!localStorage.getItem('cookiesAccepted')) {
            // Jeśli nie, pokaż baner z lekkim opóźnieniem dla lepszego efektu wizualnego
            setTimeout(() => {
                cookieBanner.classList.add('active');
            }, 1000);
        }

        // Obsługa kliknięcia przycisku akceptacji
        acceptBtn.addEventListener('click', function () {
            localStorage.setItem('cookiesAccepted', 'true'); // Zapisz w pamięci przeglądarki
            cookieBanner.classList.remove('active'); // Schowaj baner
        });
    });
</script>
<div id="cookie-banner" class="cookie-banner">
    <div class="cookie-container">
        <p>Ta strona korzysta z plików cookies, aby zapewnić Ci najlepsze doświadczenia. Korzystając ze strony, wyrażasz zgodę na ich używanie. Szczegóły znajdziesz w naszej <a href="#">Polityce Prywatności</a>.</p>
        <button id="accept-cookies" class="btn-main btn-cookie">Rozumiem</button>
    </div>
</div>
</body>
</html>
