<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'CFTP-MA — Centre de Formation Technique et Professionnelle Maria Auxiliadora | Lomé')</title>
  <meta name="description" content="@yield('meta_description', 'Le CFTP-MA forme depuis 1989 les jeunes de 16 à 25 ans à Lomé aux métiers techniques : électricité, construction métallique, informatique, esthétique et plus. Diplômes CAP et BT reconnus par l\'État.')">
  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('styles')
</head>
<body>

<!-- ============ HEADER ============ -->
<header class="site-header">
  <div class="nav-shell">
    <a class="brand" href="{{ route('home') }}" aria-label="Accueil CFTP-MA">
      <img src="{{ asset('images/logo.png') }}" alt="Logo CFTP-MA" width="38" height="38">
      <span class="brand-name">CFTP-MA<small>Maria Auxiliadora</small></span>
    </a>

    <nav class="nav-links" aria-label="Navigation principale">
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Accueil</a>
      <a href="{{ route('admissions') }}" class="{{ request()->routeIs('admissions') ? 'is-active' : '' }}">Admissions</a>
      <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">À propos</a>
      <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'is-active' : '' }}">Galerie</a>
      <a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.*') ? 'is-active' : '' }}">Actualités</a>
      <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact</a>
      @auth
        <a href="{{ url('/admin') }}" style="color:var(--gold);font-weight:600;display:inline-flex;align-items:center;gap:4px;" title="Accéder au panneau d'administration">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
          Admin
        </a>
      @endauth
    </nav>

    @auth
      <a class="btn btn-outline nav-cta" href="{{ url('/admin') }}" style="border-color:var(--gold);color:var(--gold);" title="Panneau d'administration">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right:4px;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
        Admin
      </a>
    @endauth

    <a class="btn btn-primary nav-cta" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20candidater%20au%20CFTP-MA" target="_blank" rel="noopener">Candidater</a>

    <button class="nav-toggle" id="navToggle" aria-label="Menu" aria-expanded="false">
      <span></span>
    </button>
  </div>

  <nav class="mobile-menu" id="mobileMenu" aria-label="Menu mobile">
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'is-active' : '' }}">Accueil</a>
    <a href="{{ route('admissions') }}" class="{{ request()->routeIs('admissions') ? 'is-active' : '' }}">Admissions</a>
    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'is-active' : '' }}">À propos</a>
    <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'is-active' : '' }}">Galerie</a>
    <a href="{{ route('articles.index') }}" class="{{ request()->routeIs('articles.*') ? 'is-active' : '' }}">Actualités</a>
    <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'is-active' : '' }}">Contact</a>
    @auth
      <a href="{{ url('/admin') }}" style="color:var(--gold);font-weight:600;">Espace Administration</a>
    @endauth
    <a class="btn btn-primary" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20candidater%20au%20CFTP-MA" target="_blank" rel="noopener">Candidater maintenant</a>
  </nav>
</header>

<main>
  @yield('content')
</main>

<!-- ============ FOOTER ============ -->
<footer>
  <div class="wrap">
    <div class="footer-grid">
      <div class="footer-about">
        <div class="footer-brand">
          <img src="{{ asset('images/logo.png') }}" alt="CFTP-MA" width="34" height="34">
          <span>CFTP-MA</span>
        </div>
        <p>Centre de Formation Technique et Professionnelle Maria Auxiliadora — former les jeunes de Lomé aux métiers techniques depuis 1989.</p>
        <div class="social-row">
          <a href="https://web.facebook.com/cftpma/" target="_blank" rel="noopener" aria-label="Facebook du CFTP-MA">
            <svg viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12"/></svg>
          </a>
          <a href="https://wa.me/22893007790" target="_blank" rel="noopener" aria-label="WhatsApp du CFTP-MA">
            <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 0 0-8.6 15L2 22l5.2-1.4A10 10 0 1 0 12 2m0 18.2a8.2 8.2 0 0 1-4.2-1.1l-.3-.2-3.1.8.8-3-.2-.3A8.2 8.2 0 1 1 12 20.2m4.5-6.1c-.2-.1-1.4-.7-1.7-.8-.2-.1-.4-.1-.6.1-.2.2-.6.8-.8 1-.1.2-.3.2-.5.1-.2-.1-1-.4-1.9-1.2-.7-.6-1.2-1.4-1.3-1.6-.1-.2 0-.4.1-.5.1-.1.2-.3.4-.4.1-.1.2-.2.2-.4.1-.2 0-.3 0-.4-.1-.1-.6-1.4-.8-1.9-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.4.1-.6.3-.2.2-.8.8-.8 1.9s.9 2.2 1 2.3c.1.2 1.7 2.6 4.2 3.6.6.2 1 .4 1.4.5.6.2 1.1.2 1.5.1.5-.1 1.4-.6 1.6-1.1.2-.5.2-1 .1-1.1-.1-.1-.2-.2-.4-.3"/></svg>
          </a>
        </div>
      </div>

      <div>
        <h4>Liens rapides</h4>
        <ul>
          <li><a href="{{ route('home') }}">Accueil</a></li>
          <li><a href="{{ route('admissions') }}">Admissions</a></li>
          <li><a href="{{ route('about') }}">À propos</a></li>
          <li><a href="{{ route('gallery') }}">Galerie</a></li>
          <li><a href="{{ route('articles.index') }}">Actualités</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
      </div>

      <div>
        <h4>Contact</h4>
        <ul>
          <li>Bd Mobutu Sese Seko, Akodésséwa, Lomé</li>
          <li><a href="tel:+22897668608">+228 97 66 86 08</a></li>
          <li><a href="https://wa.me/22893007790">+228 93 00 77 90 (WhatsApp)</a></li>
        </ul>
      </div>

      <div>
        <h4>Newsletter</h4>
        <p style="font-size:.85rem;color:rgba(255,255,255,.6);margin-bottom:12px;">Recevez les actualités du centre.</p>
        <form class="footer-form" onsubmit="return false;">
          <input type="email" placeholder="Votre email" aria-label="Adresse email" required>
          <button type="submit">OK</button>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
      <span>© 2026 CFTP-MA — Centre de Formation Technique et Professionnelle Maria Auxiliadora</span>
      <div style="display:inline-flex;align-items:center;gap:18px;">
        <span>Site conçu pour le CFTP-MA</span>
        <a href="{{ url('/admin') }}" style="color:inherit;opacity:0.65;text-decoration:none;display:inline-flex;align-items:center;gap:5px;font-size:0.8rem;transition:opacity 0.2s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.65'" title="Accès espace d'administration (ou raccourci Alt + A)">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
          Administration
        </a>
      </div>
    </div>
  </div>
</footer>

<script>
  // Raccourci d'accès direct pour l'administrateur : Alt + A
  document.addEventListener('keydown', function(e) {
    if (e.altKey && (e.key === 'a' || e.key === 'A')) {
      window.location.href = "{{ url('/admin') }}";
    }
  });
</script>

@stack('scripts')

</body>
</html>
