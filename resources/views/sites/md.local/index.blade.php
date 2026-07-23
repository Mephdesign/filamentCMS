<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mephdesign | Modern & Fluid</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* --- RESET & ZMIENNE GLOBALNE --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        :root {
            --bg-light: #ffffff;
            --bg-section-alt: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --primary: #0ea5e9;
            --accent-purple: #a855f7; /* Nowy kolor akcentu dla ikon */
            --primary-hover: #0284c7;
            --sidebar-width: 260px;
            --border-color: rgba(226, 232, 240, 0.8);
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg-light);
            color: var(--text-main);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* --- PRZEZROCZYSTY SIDEBAR (GLASSMORPHISM) --- */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: rgba(255, 255, 255, 0.75);
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
            border-right: 1px solid var(--border-color);
            z-index: 1000;
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
        }

        .nav-container {
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: flex-start;
            gap: 2.5rem;
        }

        /* --- LOGO W CIEMNYM KONTENERZE --- */
        .logo-container {
            display: block;
            width: 100%;
            max-width: 140px;
            /*height: 160px;*/
            text-decoration: none;
            margin: 0 auto;
            position: relative;
            flex-shrink: 0;
            /*background: #ffffff;*/
            border-radius: 16px;
            padding: 10px;
            overflow: hidden;
        }

        .logo-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .logo-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            position: relative;
            z-index: 1;
        }

        .logo-gradient-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background: linear-gradient(
                135deg,
                #0ea5e9,
                #a855f7,
                #ec4899,
                #0ea5e9
            );
            background-size: 300% 300%;
            mix-blend-mode: multiply;
            pointer-events: none;
            animation: auroraLogo 12s ease infinite;
        }

        .logo-container:hover .logo-wrapper {
            transform: scale(1.03);
            filter: drop-shadow(0 0 15px rgba(14, 165, 233, 0.6));
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), filter 0.4s ease;
        }

        @keyframes auroraLogo {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* --- NAWIGACJA (MENU) --- */
        .nav-menu {
            display: flex;
            flex-direction: column;
            list-style: none;
            gap: 1rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: var(--transition);
        }

        .nav-link i {
            font-size: 1.1rem;
            width: 20px;
            color: var(--text-muted);
            transition: var(--transition);
        }

        /* Hover i Stan Aktywny - Tekst robi się niebieski, a ikona fioletowa */
        .nav-link:hover, .nav-link.active {
            color: var(--primary);
            background: rgba(14, 165, 233, 0.05);
        }

        .nav-link:hover i, .nav-link.active i {
            color: var(--accent-purple); /* Zmiana koloru samej ikony na fioletowy */
            transform: scale(1.1);
        }

        /* --- GŁÓWNY KONTENER TREŚCI --- */
        .main-content {
            margin-left: var(--sidebar-width);
        }

        /* --- SEKCJE --- */
        section {
            padding: 100px 5rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease, transform 0.8s ease;
            position: relative;
        }

        .section-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        section:nth-of-type(even) {
            background-color: var(--bg-section-alt);
        }

        .section-title {
            font-size: 2.8rem;
            margin-bottom: 3rem;
            font-weight: 700;
            z-index: 10;
        }

        .section-title span {
            color: var(--primary);
        }

        /* --- HERO SECTION --- */
        #home {
            width: 100vw;
            margin-left: calc(-1 * var(--sidebar-width));
            padding-left: calc(var(--sidebar-width) + 8rem);
            padding-right: 8rem;
            align-items: flex-start;
            background-color: #ffffff;
            overflow: hidden;
        }

        .kinetic-grid {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(to right, rgba(14, 165, 233, 0.04) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(14, 165, 233, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: 1;
            perspective: 800px;
            transform-style: preserve-3d;
        }

        .quantum-glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0;
            pointer-events: none;
            z-index: 2;
        }

        .tech-dot {
            position: absolute;
            border-radius: 50%;
            opacity: 0;
            pointer-events: none;
            z-index: 3;
            backface-visibility: hidden;
            will-change: transform;
            transform-origin: center center;
            filter: blur(1px) drop-shadow(0 0 4px rgba(255,255,255,0.4));
            transform-style: preserve-3d;
        }

        .hero-text {
            position: relative;
            z-index: 10;
            max-width: 850px;
            margin-top: 2rem;
            pointer-events: auto;
        }

        .hero-title {
            font-size: 4.8rem;
            font-weight: 700;
            margin-bottom: 2rem;
            line-height: 1.15;
            letter-spacing: -2px;
            color: var(--text-main);
        }

        .typewriter {
            color: var(--primary);
            border-right: 4px solid var(--primary);
            white-space: nowrap;
            animation: blink 0.75s step-end infinite;
        }

        .hero-subtitle {
            font-size: 1.4rem;
            color: var(--text-muted);
            margin-bottom: 3rem;
            font-weight: 500;
            max-width: 650px;
            line-height: 1.7;
        }

        .btn {
            display: inline-block;
            background-color: var(--text-main);
            color: #ffffff;
            padding: 1.1rem 2.8rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.15);
        }

        .btn:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(14, 165, 233, 0.3);
        }

        /* --- O FIRMIE --- */
        .about-content {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-text h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--text-main);
        }

        .about-text p {
            color: var(--text-muted);
            margin-bottom: 1.5rem;
        }

        /* --- OFERTA --- */
        .offer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .offer-card {
            background: var(--bg-card);
            padding: 3.5rem 2.5rem;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.01);
            transition: var(--transition);
            cursor: pointer;
        }

        .offer-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary);
            box-shadow: 0 25px 30px -5px rgba(14, 165, 233, 0.08);
        }

        .offer-card i {
            font-size: 2.8rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .offer-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .offer-card p {
            color: var(--text-muted);
            font-size: 1rem;
        }

        /* --- KONTAKT Z SOCIAL MEDIA --- */
        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 5rem;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2.5rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .contact-item i {
            font-size: 1.3rem;
            color: var(--accent-purple); /* Zmiana domyślnego koloru małych ikon kontaktu na fiolet */
            background: #faf5ff;
            padding: 1rem;
            border-radius: 12px;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-info h4 {
            font-size: 1.2rem;
            margin-bottom: 0.2rem;
        }

        .contact-item p {
            color: var(--text-muted);
        }

        /* SEKCJA SOCIAL MEDIA */
        .social-media-box {
            margin-top: 1rem;
            border-top: 1px solid var(--border-color);
            padding-top: 2rem;
        }

        .social-media-box h4 {
            font-size: 1.2rem;
            margin-bottom: 1.2rem;
            font-weight: 600;
        }

        .social-grid {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            color: var(--text-muted);
            font-size: 1.2rem;
            text-decoration: none;
            transition: var(--transition);
        }

        .social-link:hover {
            color: #ffffff;
            background: var(--accent-purple); /* Fioletowy hover dla social media */
            border-color: var(--accent-purple);
            transform: translateY(-4px);
            box-shadow: 0 8px 16px rgba(168, 85, 247, 0.25);
        }

        .contact-form {
            background: var(--bg-card);
            padding: 3rem;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.01);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            width: 100%;
            padding: 1.1rem;
            background: #f8fafc;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: var(--text-main);
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.15);
        }

        textarea.form-control {
            resize: none;
            height: 140px;
        }

        .submit-btn {
            width: 100%;
            border: none;
            cursor: pointer;
        }
        .insta-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .insta-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 24px; /* Odstępy między boksami */
        }
        .insta-box {
            flex: 1 1 calc(33.333% - 16px); /* Wymuszenie 3 kolumn obok siebie */
            min-width: 280px; /* Żeby na telefonach ładnie schodziły pod spód */
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            text-decoration: none;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .insta-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .insta-img-wrapper {
            position: relative;
            width: 100%;
            padding-top: 100%; /* Perfekcyjny kwadrat */
            overflow: hidden;
            background: #f3f4f6;
        }
        .insta-img-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .insta-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(0,0,0,0.6);
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-family: sans-serif;
        }
        .insta-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .insta-text {
            color: #4b5563;
            font-size: 14px;
            line-height: 1.5;
            font-family: sans-serif;
            margin: 0 0 16px 0;
            /* Obcinanie tekstu do 3 linijek */
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .insta-link {
            color: #db2777;
            font-weight: 600;
            font-size: 14px;
            font-family: sans-serif;
            margin-top: auto;
        }

        /* --- FOOTER --- */
        footer {
            background: #f8fafc;
            text-align: center;
            padding: 2.5rem;
            border-top: 1px solid var(--border-color);
            color: var(--text-muted);
            font-size: 0.95rem;
            position: relative;
            z-index: 10;
        }

        @keyframes blink {
            from, to { border-color: transparent }
            50% { border-color: var(--primary); }
        }

        /* --- STYLIZACJA PASKA NA MOBILE --- */
        @media (max-width: 1024px) {
            header {
                width: 100%;
                height: 80px;
                position: fixed;
                padding: 0 2rem;
                border-right: none;
                border-bottom: 1px solid var(--border-color);
                background: rgba(255, 255, 255, 0.85);
            }

            .nav-container {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                gap: 0;
                width: 100%;
            }

            .logo-container {
                width: 55px;
                height: 65px;
                margin: 0;
                padding: 5px;
            }

            .nav-menu {
                flex-direction: row;
                gap: 1.5rem;
            }

            .nav-link span { display: none; }
            .main-content { margin-left: 0; }

            #home {
                width: 100%;
                margin-left: 0;
                padding-left: 2rem;
                padding-right: 2rem;
                padding-top: 140px;
            }

            section {
                padding: 120px 2rem 60px 2rem;
                min-height: auto;
            }

            .hero-title { font-size: 3.2rem; }
            .about-content, .contact-wrapper { grid-template-columns: 1fr; gap: 3rem; }
        }

        @media (max-width: 480px) {
            .nav-menu { gap: 0.8rem; }
            .hero-title { font-size: 2.5rem; }
            #home { padding-top: 130px; }
        }
        /* STYLE DLA WIZUALIZATORA */
        .about-content {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        /* Filary tekstowe po lewej */
        .pillars-container {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .pillar-item {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            padding: 1rem;
            background: rgba(14, 165, 233, 0.03);
            border-radius: 12px;
            border: 1px solid transparent;
            transition: var(--transition);
            cursor: default;
        }

        .pillar-item:hover {
            border-color: var(--accent-purple);
            background: rgba(168, 85, 247, 0.05);
            transform: translateX(10px);
        }

        .pillar-item i {
            font-size: 1.5rem;
            color: var(--primary);
            width: 30px;
            text-align: center;
        }

        .pillar-item strong {
            display: block;
            font-size: 1.1rem;
            color: var(--text-main);
        }

        .pillar-item span {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        /* Kontener Wizualizatora */
        .visualizer-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 450px;
            position: relative;
        }

        .ecosystem-visualizer {
            position: relative;
            width: 400px;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Hub centralny */
        .hub {
            width: 80px;
            height: 80px;
            background: #0f172a;
            border: 2px solid var(--accent-purple);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.4);
        }

        .hub i {
            font-size: 2rem;
            color: var(--accent-purple);
        }

        .hub-pulse {
            position: absolute;
            width: 80px;
            height: 80px;
            border: 2px solid var(--accent-purple);
            border-radius: 50%;
            animation: pulseHub 2s infinite;
        }

        @keyframes pulseHub {
            0% { transform: scale(1); opacity: 0.6; }
            100% { transform: scale(1.8); opacity: 0; }
        }

        /* Orbity */
        .orbit {
            position: absolute;
            border: 1px dashed rgba(100, 116, 139, 0.2);
            border-radius: 50%;
            transition: all 0.5s ease;
        }

        .orbit-1 { width: 180px; height: 180px; animation: rotate 15s linear infinite; }
        .orbit-2 { width: 280px; height: 280px; animation: rotate 25s linear infinite reverse; }
        .orbit-3 { width: 380px; height: 380px; animation: rotate 35s linear infinite; }

        /* Nody (Ikony na orbitach) */
        .node {
            position: absolute;
            width: 40px;
            height: 40px;
            background: #ffffff;
            border: 2px solid var(--primary);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 50%;
            left: -20px; /* Pozycjonowanie na krawędzi okręgu */
            transform: translateY(-50%);
            /* Kontr-rotacja: Ikona obraca się w przeciwną stronę, by zawsze być pionowo */
            animation: counterRotate inherit;
            animation-direction: reverse;
        }

        .node i { font-size: 1rem; color: var(--primary); }

        .node-3 { border-color: var(--accent-purple); }
        .node-3 i { color: var(--accent-purple); }

        /* Animacje */
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Klasy podświetlenia wywoływane przez JS */
        .orbit.highlight {
            border-color: var(--accent-purple);
            border-style: solid;
            border-width: 2px;
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.2);
        }

        /* Responsywność */
        @media (max-width: 1024px) {
            .about-content { grid-template-columns: 1fr; }
            .visualizer-wrapper { height: 350px; transform: scale(0.8); }
        }
    </style>
</head>
<body>

    <header>
        <nav class="nav-container">
            <a href="#home" class="logo-container">
                <div class="logo-wrapper">
                    <img src="md-logo.png" alt="Mephdesign Logo" class="logo-img">
<!--                    <div class="logo-gradient-overlay"></div>-->
                </div>
            </a>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link active"><i class="fa-solid fa-compass"></i><span>Home</span></a></li>
                <li><a href="#about" class="nav-link"><i class="fa-solid fa-fingerprint"></i><span>O firmie</span></a></li>
                <li><a href="#offer" class="nav-link"><i class="fa-solid fa-shapes"></i><span>Oferta</span></a></li>
                <li><a href="#contact" class="nav-link"><i class="fa-solid fa-bolt-lightning"></i><span>Kontakt</span></a></li>
            </ul>
        </nav>
    </header>

    <main class="main-content">

        <section id="home">
            <div class="kinetic-grid" id="grid-container"></div>
            <div class="hero-text">
                <h1 class="hero-title">Tworzymy <br><span class="typewriter" id="typewriter"></span></h1>
                <p class="hero-subtitle">Mephdesign to studio projektowe nowej generacji. Projektuję zaawansowane aplikacje, nowoczesne serwisy internetowe oraz inteligentne automatyzacje procesów z wykorzystaniem sztucznej inteligencji (AI), kładąc nacisk na pixel-perfect design.</p>
                <a href="#offer" class="btn">Poznaj nasze usługi</a>
            </div>
        </section>

        <section id="about">
            <div class="section-container">
                <h2 class="section-title">O <span>Firmie</span></h2>
                <div class="about-content">
                    <div class="about-text">
                        <h3>Kim jestem i dlaczego stworzyłem Mephdesign?</h3>
                        <p>Od lat zawodowo zajmuję się programowaniem i tworzeniem zaawansowanych rozwiązań webowych (więcej o moim technicznym doświadczeniu przeczytasz na <a href="http://damiankarwacki.pl" target="_blank" style="color: var(--primary); text-decoration: none; font-weight: 600;">damiankarwacki.pl</a>). Mephdesign powstało z potrzeby wyjścia poza schematy i ciągłego rozwoju w nowych obszarach – w tym w nowoczesnych automatyzacjach AI.</p>

                        <p>Mephdesign to również odpowiedź na potrzeby osób stawiających pierwsze kroki w biznesie. Wiem, że inwestycja w sieć budzi sporo wątpliwości, dlatego rezygnuję ze sztywnych procedur na rzecz partnerstwa. Zanim podpiszemy umowę, poświęcam czas na <strong>bezpłatną konsultację</strong>, aby każdy Klient dokładnie rozumiał proces i wiedział, na co wydawana jest każda złotówka.</p>

                        <div class="pillars-container">
                            <div class="pillar-item" onmouseover="highlightOrbit(1)" onmouseout="resetOrbits()">
                                <i class="fa-solid fa-bezier-curve"></i>
                                <div>
                                    <strong>Design & Struktura</strong>
                                    <span>Pixel-perfect UI/UX i fundament Twojej marki.</span>
                                </div>
                            </div>
                            <div class="pillar-item" onmouseover="highlightOrbit(2)" onmouseout="resetOrbits()">
                                <i class="fa-solid fa-gears"></i>
                                <div>
                                    <strong>Silnik & Wykonanie</strong>
                                    <span>Stabilny kod, systemy ERP i aplikacje webowe.</span>
                                </div>
                            </div>
                            <div class="pillar-item" onmouseover="highlightOrbit(3)" onmouseout="resetOrbits()">
                                <i class="fa-solid fa-brain"></i>
                                <div>
                                    <strong>Inteligencja & Wzrost</strong>
                                    <span>Automatyzacje AI oszczędzające Twój czas.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="visualizer-wrapper">
                        <div class="ecosystem-visualizer">
                            <div class="hub">
                                <img src="md-bialy.png" style="width: 30px;">
<!--                                <i class="fa-solid fa-compass"></i>-->

                                <div class="hub-pulse"></div>
                            </div>

                            <div class="orbit orbit-1" id="orb-1">
                                <div class="node node-1"><i class="fa-solid fa-bezier-curve"></i></div>
                            </div>

                            <div class="orbit orbit-2" id="orb-2">
                                <div class="node node-2"><i class="fa-solid fa-gears"></i></div>
                            </div>

                            <div class="orbit orbit-3" id="orb-3">
                                <div class="node node-3"><i class="fa-solid fa-brain"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="offer">
            <div class="section-container">
                <h2 class="section-title">Nasza <span>Oferta</span></h2>
                <div class="offer-grid">
                    <div class="offer-card">
                        <i class="fa-solid fa-laptop-code"></i>
                        <h3>Strony Internetowe</h3>
                        <p>Tworzę szybkie, bezpieczne i nowoczesne strony wizytówkowe oraz serwisy korporacyjne, które idealnie dopasowuję do specyfiki Twojej branży.</p>
                    </div>
                    <div class="offer-card">
                        <i class="fa-solid fa-network-wired"></i>
                        <h3>Dedykowane Systemy ERP</h3>
                        <p>Tworzę intuicyjne aplikacje internetowe i panele managerskie dopasowane do specyfiki Twojej firmy, łącząc zarządzanie zasobami z inteligentną analityką.</p>
                    </div>
                    <div class="offer-card">
                        <i class="fa-solid fa-robot"></i>
                        <h3>Automatyzacje i Sztuczna Inteligencja</h3>
                        <p>Wdrażam inteligentne boty, asystentów AI oraz automatyczne przepływy pracy (workflow), które przejmują powtarzalne zadania, eliminują błędy i oszczędzają setki godzin Twojego czasu.</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="max-w-6xl mx-auto px-4 py-10">
            @if(!empty($instagram['posts']))
                <div class="insta-container">
                    <h2 class="section-title">Najnowsze na <span>Instagramie</span></h2>

                    <div class="insta-grid">
                        @foreach($instagram['posts'] as $post)
                            <a href="{{ $post['permalink'] }}" target="_blank" rel="noopener" class="insta-box">

                                <div class="insta-img-wrapper">
                                    @if(isset($post['mediaType']) && $post['mediaType'] === 'VIDEO' && isset($post['thumbnailUrl']))
                                        <img src="{{ $post['thumbnailUrl'] }}" alt="Instagram Video">
                                        <div class="insta-badge">▶ Wideo</div>
                                    @else
                                        <img src="{{ $post['mediaUrl'] ?? '' }}" alt="Instagram Post">
                                    @endif
                                </div>

                                <div class="insta-content">
                                    <p class="insta-text">
                                        {{ $post['caption'] ?? 'Zobacz najnowszy post na naszym profilu!' }}
                                    </p>
                                    <span class="insta-link">Zobacz na Instagramie →</span>
                                </div>

                            </a>
                        @endforeach
                    </div>
                </div>
            @else
            <p class="text-gray-500 italic">Chwilowo nie udało się załadować postów.</p>
            @endif
        </div>
        <section id="contact">
            <div class="section-container">
                <h2 class="section-title">Napisz do <span>Nas</span></h2>
                <div class="contact-wrapper">
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fa-solid fa-envelope"></i>
                            <div>
                                <h4>Email</h4>
                                <p>kontakt@mephdesign.pl</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-phone"></i>
                            <div>
                                <h4>Telefon</h4>
                                <p>+48 665 650 036</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <div>
                                <h4>Lokalizacja</h4>
                                <p>Żory, Polska</p>
                            </div>
                        </div>

                        <div class="social-media-box">
                            <h4>Znajdź nas na</h4>
                            <div class="social-grid">
                                <a href="#" class="social-link" title="Behance"><i class="fa-brands fa-behance"></i></a>
                                <a href="#" class="social-link" title="Dribbble"><i class="fa-brands fa-dribbble"></i></a>
                                <a href="#" class="social-link" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#" class="social-link" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-form">
                        <form id="mephForm">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Twoje Imię" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Twój Adres Email" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message" placeholder="Treść wiadomości..." required></textarea>
                            </div>
                            <button type="submit" class="btn submit-btn">Wyślij Wiadomość</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <p>&copy; 2026 Mephdesign. Wszelkie prawa zastrzeżone.</p>
        </footer>

    </main>

    <script>
        // 1. MASZYNA DO PISANIA
        const words = ["nowoczesne strony.", "aplikacje webowe i ERP.", "automatyzacje procesów AI."];
        let i = 0;
        let timer;

        function typingEffect() {
            let word = words[i].split("");
            var loopTyping = function() {
                if (word.length > 0) {
                    document.getElementById('typewriter').innerHTML += word.shift();
                } else {
                    setTimeout(deletingEffect, 2000);
                    return false;
                }
                timer = setTimeout(loopTyping, 100);
            };
            loopTyping();
        }

        function deletingEffect() {
            let word = words[i].split("");
            var loopDeleting = function() {
                if (word.length > 0) {
                    word.pop();
                    document.getElementById('typewriter').innerHTML = word.join("");
                } else {
                    if (words.length > (i + 1)) {
                        i++;
                    } else {
                        i = 0;
                    }
                    setTimeout(typingEffect, 500);
                    return false;
                }
                timer = setTimeout(loopDeleting, 50);
            };
            loopDeleting();
        }
        typingEffect();

        // 2. AMBIENT 3D (RWD)
        const gridContainer = document.getElementById('grid-container');
        const isMobile = window.innerWidth <= 768;
        const dotCount = isMobile ? 30 : 95;

        for (let j = 0; j < dotCount; j++) {
            const dot = document.createElement('div');
            dot.classList.add('tech-dot');
            const baseSize = isMobile ? (Math.random() * 6 + 2) : (Math.random() * 10 + 3);

            dot.style.left = '50%';
            dot.style.top = '50%';

            const angle = Math.random() * Math.PI * 2;
            const maxDistance = isMobile ? 22 : 45;
            const distance = Math.random() * maxDistance + 10;
            const endX = Math.cos(angle) * distance;
            const endY = Math.sin(angle) * distance;

            const randomHue = Math.floor(Math.random() * 360);
            const randomColor = `hsl(${randomHue}, 95%, 65%)`;
            const duration = Math.random() * 25 + 35;
            const initialOffset = Math.random() * -duration;

            dot.style.width = `${baseSize}px`;
            dot.style.height = `${baseSize}px`;
            dot.style.backgroundColor = randomColor;

            const maxScale = isMobile ? 3 : 4.5;

            dot.animate([
                { transform: 'translate3d(-50%, -50%, -600px) scale(0.05)', opacity: 0 },
                { opacity: 1, offset: 0.2 },
                { opacity: 1, offset: 0.85 },
                { transform: `translate3d(calc(-50% + ${endX}vw), calc(-50% + ${endY}vh), 600px) scale(${maxScale})`, opacity: 0 }
            ], {
                duration: duration * 1000,
                iterations: Infinity,
                delay: initialOffset * 1000,
                easing: 'cubic-bezier(0.1, 0.25, 0.1, 1)'
            });
            gridContainer.appendChild(dot);
        }

        // 3. ORBY W TLE
        const glowColors = ['rgba(14, 165, 233, 0.18)', 'rgba(236, 72, 153, 0.15)', 'rgba(34, 197, 94, 0.15)', 'rgba(168, 85, 247, 0.16)'];
        function createQuantumOrb() {
            const orb = document.createElement('div');
            orb.classList.add('quantum-glow-orb');
            gridContainer.appendChild(orb);

            function randomizeAndAnimate() {
                const size = isMobile ? (Math.random() * 200 + 150) : (Math.random() * 300 + 300);
                orb.style.width = `${size}px`;
                orb.style.height = `${size}px`;
                orb.style.left = `${Math.random() * 90}%`;
                orb.style.top = `${Math.random() * 90}%`;
                orb.style.background = glowColors[Math.floor(Math.random() * glowColors.length)];

                const animation = orb.animate([
                    { opacity: 0, transform: 'scale(0.7) translate(0px, 0px)' },
                    { opacity: 0.35, transform: 'scale(1) translate(20px, -20px)', offset: 0.4 },
                    { opacity: 0.35, transform: 'scale(1.05) translate(-10px, 10px)', offset: 0.7 },
                    { opacity: 0, transform: 'scale(0.8) translate(0px, 0px)' }
                ], { duration: Math.random() * 4000 + 5000, easing: 'ease-in-out' });
                animation.onfinish = randomizeAndAnimate;
            }
            randomizeAndAnimate();
        }
        const orbCount = isMobile ? 2 : 3;
        for(let k=0; k<orbCount; k++) setTimeout(createQuantumOrb, k * 1800);

        // 4. OBSERVER SEKCJI
        const sections = document.querySelectorAll("section");
        const navLinks = document.querySelectorAll(".nav-link");
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                const id = entry.target.getAttribute("id");
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    navLinks.forEach((link) => {
                        link.classList.remove("active");
                        if (link.getAttribute("href") === `#${id}`) link.classList.add("active");
                    });
                    if(id === 'about') {
                        document.querySelectorAll('.skill-bar').forEach(bar => {
                            bar.style.width = bar.getAttribute('data-width');
                        });
                    }
                } else {
                    entry.target.classList.remove("visible");
                }
            });
        }, { root: null, threshold: 0.15, rootMargin: "-5% 0px -5% 0px" });
        sections.forEach((section) => observer.observe(section));

        // 5. FORMULARZ
        document.getElementById('mephForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const submitBtn = document.querySelector('.submit-btn');
            submitBtn.innerText = "Wysyłanie...";
            setTimeout(() => {
                submitBtn.innerText = "Wiadomość Wysłana! ✓";
                submitBtn.style.background = "#10b981";
                document.getElementById('mephForm').reset();
                setTimeout(() => {
                    submitBtn.innerText = "Wyślij Wiadomość";
                    submitBtn.style.background = "var(--text-main)";
                }, 3000);
            }, 1500);
        });

        function highlightOrbit(index) {
            // Usuwamy podświetlenie ze wszystkich
            document.querySelectorAll('.orbit').forEach(orb => orb.classList.remove('highlight'));
            // Dodajemy do wybranej
            document.getElementById('orb-' + index).classList.add('highlight');
        }

        function resetOrbits() {
            document.querySelectorAll('.orbit').forEach(orb => orb.classList.remove('highlight'));
        }
    </script>
</body>
</html>
