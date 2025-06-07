<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teknolojik Ürünler</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --dark-gradient: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --neon-blue: #00d4ff;
            --neon-purple: #8b5cf6;
            --neon-pink: #f472b6;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--dark-gradient);
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(120, 119, 198, 0.2) 0%, transparent 50%);
            animation: backgroundShift 20s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes backgroundShift {
            0%, 100% { transform: translateX(0) translateY(0); }
            33% { transform: translateX(-20px) translateY(-10px); }
            66% { transform: translateX(20px) translateY(10px); }
        }

        /* Floating Particles */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: var(--neon-blue);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
            opacity: 0.7;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        /* Header */
        .header {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .header h1 {
            font-family: 'Orbitron', monospace;
            font-weight: 900;
            background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple), var(--neon-pink));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.5rem;
            text-shadow: 0 0 30px rgba(0, 212, 255, 0.5);
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { filter: brightness(1); }
            to { filter: brightness(1.2); }
        }

        /* Product Cards */
        .product-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            height: 100%;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .product-card:hover::before {
            opacity: 1;
        }

        .product-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1),
                0 0 50px rgba(139, 92, 246, 0.3);
            border-color: var(--neon-purple);
        }

        .product-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.4s ease;
            filter: brightness(0.9);
        }

        .product-card:hover .product-img {
            transform: scale(1.1);
            filter: brightness(1.1);
        }

        .product-content {
            padding: 1.5rem;
            color: white;
        }

        .product-title {
            font-family: 'Orbitron', monospace;
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            background: linear-gradient(45deg, #fff, var(--neon-blue));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .btn-tech {
            background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple));
            border: none;
            color: white;
            padding: 12px 24px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-size: 0.85rem;
        }

        .btn-tech::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-tech:hover::before {
            left: 100%;
        }

        .btn-tech:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4);
            background: linear-gradient(45deg, var(--neon-purple), var(--neon-pink));
        }

        /* Footer */
        .footer {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            border-top: 1px solid var(--glass-border);
            color: rgba(255, 255, 255, 0.8);
            margin-top: 4rem;
        }

        /* Loading Animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--dark-gradient);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading-spinner {
            width: 60px;
            height: 60px;
            border: 3px solid rgba(255, 255, 255, 0.1);
            border-top: 3px solid var(--neon-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
            
            .product-card {
                margin-bottom: 2rem;
            }
        }

        /* Scroll Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Tech Icons */
        .tech-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            background: rgba(0, 212, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--neon-blue);
            font-size: 1.2rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 212, 255, 0.3);
        }
    </style>
</head>
<body>
    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>

    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>

    <!-- Header -->
    <header class="header py-4 mb-5">
        <div class="container">
            <h1 class="text-center mb-0">
                <i class="fas fa-microchip me-3"></i>
                Teknolojik Ürünler
                <i class="fas fa-rocket ms-3"></i>
            </h1>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row g-4" id="productsContainer">
            <!-- Sample Products (Replace with PHP) -->
            <div class="col-lg-4 col-md-6 fade-in" style="animation-delay: 0.1s">
                <div class="product-card">
                    <div class="tech-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=250&fit=crop" alt="Laptop" class="product-img">
                    <div class="product-content">
                        <h5 class="product-title">Gaming Laptop Pro</h5>
                        <p class="product-description">Yüksek performanslı gaming laptop. RTX 4080 ekran kartı ve 32GB RAM ile oyun deneyiminizi zirveye taşıyın.</p>
                        <button class="btn btn-tech">
                            <i class="fas fa-eye me-2"></i>
                            Detayları Gör
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in" style="animation-delay: 0.2s">
                <div class="product-card">
                    <div class="tech-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400&h=250&fit=crop" alt="Smartphone" class="product-img">
                    <div class="product-content">
                        <h5 class="product-title">Smart Phone Ultra</h5>
                        <p class="product-description">Son teknoloji akıllı telefon. AI destekli kamera sistemi ve ultra hızlı şarj özelliği ile hayatınızı kolaylaştırın.</p>
                        <button class="btn btn-tech">
                            <i class="fas fa-eye me-2"></i>
                            Detayları Gör
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in" style="animation-delay: 0.3s">
                <div class="product-card">
                    <div class="tech-icon">
                        <i class="fas fa-headphones"></i>
                    </div>
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400&h=250&fit=crop" alt="Headphones" class="product-img">
                    <div class="product-content">
                        <h5 class="product-title">Wireless Headphones</h5>
                        <p class="product-description">Premium kalite kablosuz kulaklık. Aktif gürültü engelleme ve 30 saate kadar müzik dinleme keyfi.</p>
                        <button class="btn btn-tech">
                            <i class="fas fa-eye me-2"></i>
                            Detayları Gör
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in" style="animation-delay: 0.4s">
                <div class="product-card">
                    <div class="tech-icon">
                        <i class="fas fa-tv"></i>
                    </div>
                    <img src="https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=400&h=250&fit=crop" alt="Smart TV" class="product-img">
                    <div class="product-content">
                        <h5 class="product-title">4K Smart TV</h5>
                        <p class="product-description">65 inç 4K OLED Smart TV. HDR10+ desteği ve yapay zeka destekli görüntü işleme teknolojisi.</p>
                        <button class="btn btn-tech">
                            <i class="fas fa-eye me-2"></i>
                            Detayları Gör
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in" style="animation-delay: 0.5s">
                <div class="product-card">
                    <div class="tech-icon">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <img src="https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=400&h=250&fit=crop" alt="Gaming Console" class="product-img">
                    <div class="product-content">
                        <h5 class="product-title">Gaming Console X</h5>
                        <p class="product-description">Yeni nesil oyun konsolu. 4K 120fps oyun deneyimi ve ray tracing teknolojisi ile gerçekçi görüntüler.</p>
                        <button class="btn btn-tech">
                            <i class="fas fa-eye me-2"></i>
                            Detayları Gör
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 fade-in" style="animation-delay: 0.6s">
                <div class="product-card">
                    <div class="tech-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <img src="https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=400&h=250&fit=crop" alt="Camera" class="product-img">
                    <div class="product-content">
                        <h5 class="product-title">Professional Camera</h5>
                        <p class="product-description">Profesyonel fotoğraf makinesi. 50MP sensor ve 8K video çekim özelliği ile yaratıcılığınızı keşfedin.</p>
                        <button class="btn btn-tech">
                            <i class="fas fa-eye me-2"></i>
                            Detayları Gör
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center py-4">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-3">
                <i class="fas fa-code me-2"></i>
                <span>&copy; 2025 Teknolojik Ürünler | Tüm hakları saklıdır.</span>
                <i class="fas fa-code ms-2"></i>
            </div>
            <div class="d-flex justify-content-center gap-3">
                <i class="fab fa-twitter text-primary"></i>
                <i class="fab fa-facebook text-primary"></i>
                <i class="fab fa-instagram text-primary"></i>
                <i class="fab fa-linkedin text-primary"></i>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Loading Animation
        window.addEventListener('load', function() {
            setTimeout(() => {
                document.getElementById('loadingOverlay').style.opacity = '0';
                setTimeout(() => {
                    document.getElementById('loadingOverlay').style.display = 'none';
                }, 500);
            }, 1000);
        });

        // Generate Floating Particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 6 + 's';
                particle.style.animationDuration = (Math.random() * 3 + 3) + 's';
                
                // Random colors
                const colors = ['#00d4ff', '#8b5cf6', '#f472b6'];
                particle.style.background = colors[Math.floor(Math.random() * colors.length)];
                
                particlesContainer.appendChild(particle);
            }
        }

        // Intersection Observer for Scroll Animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animationPlayState = 'running';
                }
            });
        }, observerOptions);

        // Parallax Effect on Mouse Move
        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;
            
            const particles = document.querySelectorAll('.particle');
            particles.forEach((particle, index) => {
                const speed = (index % 3 + 1) * 0.5;
                const x = (mouseX - 0.5) * speed * 10;
                const y = (mouseY - 0.5) * speed * 10;
                particle.style.transform = `translate(${x}px, ${y}px)`;
            });
        });

        // Enhanced Button Click Effects
        document.querySelectorAll('.btn-tech').forEach(button => {
            button.addEventListener('click', function(e) {
                // Create ripple effect
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple CSS
        const style = document.createElement('style');
        style.textContent = `
            .btn-tech {
                position: relative;
                overflow: hidden;
            }
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
            }
            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Initialize
        createParticles();
        
        // Observe fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Dynamic Background Color Change
        let colorIndex = 0;
        const colors = [
            'radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%)',
            'radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%)',
            'radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.2) 0%, transparent 50%)'
        ];

        setInterval(() => {
            colorIndex = (colorIndex + 1) % colors.length;
            document.body.style.background = `
                linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 100%),
                ${colors[colorIndex]}
            `;
        }, 8000);
    </script>
</body>
</html>