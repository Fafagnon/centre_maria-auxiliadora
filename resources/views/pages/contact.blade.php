@extends('layouts.app')

@section('title', 'Contact — CFTP-MA | Centre de Formation Technique et Professionnelle Maria Auxiliadora')
@section('meta_description', 'Contactez le CFTP-MA à Lomé : adresse, téléphone, WhatsApp et coordonnées utiles.')

@section('content')
  <!-- ============ PAGE HERO ============ -->
  <section class="page-hero">
    <div class="wrap">
      <div class="page-hero-text">
        <span class="kicker">Contact</span>
        <h1>Nous contacter</h1>
        <p class="lead">Une question sur nos formations, nos modalités d'admission ou un partenariat ? Nos équipes sont à votre écoute.</p>
      </div>
    </div>
  </section>

  <!-- ============ CONTACT INFO ============ -->
  <section class="section cream">
    <div class="wrap">
      <div class="cond-grid">
        <div class="cond-card">
          <span class="tag">Coordonnées directes</span>
          <h3>Nos numéros & WhatsApp</h3>
          <ul class="cond-list">
            <li><strong>Téléphone</strong> <a href="tel:+22897668608" style="color:var(--navy);font-weight:600;">+228 97 66 86 08</a></li>
            <li><strong>WhatsApp</strong> <a href="https://wa.me/22893007790" target="_blank" rel="noopener" style="color:var(--gold-dark);font-weight:600;">+228 93 00 77 90</a></li>
            <li><strong>Facebook</strong> <a href="https://web.facebook.com/cftpma/" target="_blank" rel="noopener" style="color:var(--blue-mid);">facebook.com/cftpma</a></li>
          </ul>
          <div style="margin-top:24px;">
            <a class="btn btn-gold" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20contacter%20le%20CFTP-MA" target="_blank" rel="noopener">Écrire sur WhatsApp</a>
          </div>
        </div>

        <div class="cond-card alt">
          <span class="tag">Localisation</span>
          <h3>Venir au centre</h3>
          <ul class="cond-list">
            <li><strong>Adresse</strong> Bd Mobutu Sese Seko, Akodésséwa, Lomé (Togo)</li>
            <li><strong>Repère</strong> En face de la paroisse Maria Auxiliadora</li>
            <li><strong>Horaires</strong> Du lundi au vendredi : 07h30 – 17h30</li>
          </ul>
          <div style="margin-top:24px;">
            <a class="btn btn-outline" href="tel:+22897668608">Appeler le secrétariat</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ CTA FINALE ============ -->
  <section class="section dark cta-band">
    <div class="wrap">
      <h2>Prêt à nous rejoindre ?</h2>
      <p>Découvrez dès à présent l'ensemble des formations dispensées au CFTP-MA.</p>
      <div class="cta-band-actions">
        <a class="btn btn-gold" href="{{ route('home') }}#formations">Voir les formations</a>
        <a class="btn btn-outline on-dark" href="{{ route('admissions') }}">Voir les admissions</a>
      </div>
    </div>
  </section>
@endsection
