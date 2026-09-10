@extends('layouts.app')

@section('title', $article->title . ' — CFTP-MA')
@section('meta_description', $article->excerpt ?? Str::limit(strip_tags($article->body), 150))

@section('content')
  <!-- ============ ARTICLE HERO ============ -->
  <article class="article-page">
    <header class="article-hero">
      <div class="wrap">
        <span class="kicker">Actualités</span>
        <h1>{{ $article->title }}</h1>
        <div class="article-meta">
          <span>Publié le {{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : 'Date non spécifiée' }}</span>
        </div>
      </div>
    </header>

    <!-- ============ ARTICLE COVER ============ -->
    <div class="wrap article-cover">
      <div class="img-frame">
        <span class="img-frame__label">Photo à ajouter<br><code>{{ $article->cover_image ? 'storage/'.$article->cover_image : 'articles/'.$article->slug.'.jpg' }}</code></span>
        @if($article->cover_image_url)
          <img src="{{ $article->cover_image_url }}" alt="{{ $article->title }}" loading="lazy" decoding="async" onerror="this.style.display='none'">
        @endif
      </div>
    </div>

    <!-- ============ ARTICLE CONTENT ============ -->
    <div class="wrap article-content">
      <div class="article-body">
        {!! $article->body !!}
      </div>

      <div class="article-back-wrap">
        <a href="{{ route('articles.index') }}" class="btn btn-outline">&larr; Retour aux actualités</a>
      </div>
    </div>
  </article>

  <!-- ============ CTA FINALE ============ -->
  <section class="section dark cta-band">
    <div class="wrap reveal">
      <h2>Intéressé par une formation au CFTP-MA ?</h2>
      <p>Consultez les conditions d'admission ou contactez nos conseillers sur WhatsApp pour toute question.</p>
      <div class="cta-band-actions">
        <a class="btn btn-gold" href="{{ route('admissions') }}">Voir les admissions</a>
        <a class="btn btn-outline on-dark" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20candidater%20au%20CFTP-MA" target="_blank" rel="noopener">Écrire sur WhatsApp</a>
      </div>
    </div>
  </section>
@endsection
