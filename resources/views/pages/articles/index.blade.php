@extends('layouts.app')

@section('title', 'Actualités — CFTP-MA | Centre de Formation Technique et Professionnelle Maria Auxiliadora')
@section('meta_description', 'Suivez toutes les actualités, annonces de rentrée, événements et projets du CFTP-MA à Lomé.')

@section('content')
  <!-- ============ PAGE HERO ============ -->
  <section class="page-hero">
    <div class="wrap">
      <div class="page-hero-text">
        <span class="kicker">Actualités</span>
        <h1>Les actualités du CFTP-MA</h1>
        <p class="lead">Découvrez les derniers événements, annonces d'inscriptions, partenariats et réussites au sein de notre centre de formation à Akodésséwa.</p>
      </div>
    </div>
  </section>

  <!-- ============ NEWS GRID & PAGINATION ============ -->
  <section class="section cream">
    <div class="wrap">
      @if($articles->count() > 0)
        <div class="news-grid">
          @foreach($articles as $article)
          <article class="news-card">
            <div class="img-frame radius-c">
              <span class="img-frame__label">Photo à ajouter<br><code>{{ $article->cover_image ? 'storage/'.$article->cover_image : 'articles/'.$article->slug.'.jpg' }}</code></span>
              @if($article->cover_image_url)
                <img src="{{ $article->cover_image_url }}" alt="{{ $article->title }}" loading="lazy" onerror="this.style.display='none'">
              @endif
            </div>
            <span class="news-date">{{ $article->published_at ? $article->published_at->translatedFormat('d F Y') : 'Date à préciser' }}</span>
            <h3>{{ $article->title }}</h3>
            <p>{{ $article->excerpt ?? Str::limit(strip_tags($article->body), 120) }}</p>
            <a class="read-more" href="{{ route('articles.show', $article->slug) }}">Lire la suite</a>
          </article>
          @endforeach
        </div>

        {{-- Custom Styled Pagination --}}
        @if($articles->hasPages())
          <div class="pagination-wrap" role="navigation" aria-label="Pagination">
            {{-- Previous Page Link --}}
            @if ($articles->onFirstPage())
              <span class="page-btn is-disabled" aria-disabled="true">&larr; Précédent</span>
            @else
              <a href="{{ $articles->previousPageUrl() }}" class="page-btn" rel="prev">&larr; Précédent</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($articles->links()->elements as $element)
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                <span class="page-btn is-disabled">{{ $element }}</span>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                @foreach ($element as $page => $url)
                  @if ($page == $articles->currentPage())
                    <span class="page-btn is-active" aria-current="page">{{ $page }}</span>
                  @else
                    <a href="{{ $url }}" class="page-btn">{{ $page }}</a>
                  @endif
                @endforeach
              @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($articles->hasMorePages())
              <a href="{{ $articles->nextPageUrl() }}" class="page-btn" rel="next">Suivant &rarr;</a>
            @else
              <span class="page-btn is-disabled" aria-disabled="true">Suivant &rarr;</span>
            @endif
          </div>
        @endif
      @else
        <div style="text-align:center;padding:60px 0;">
          <p style="color:var(--muted);font-size:1.1rem;">Aucun article publié pour le moment.</p>
        </div>
      @endif
    </div>
  </section>

  <!-- ============ CTA FINALE ============ -->
  <section class="section dark cta-band">
    <div class="wrap">
      <h2>Prêt à commencer votre formation ?</h2>
      <p>Rejoignez nos prochaines sessions de formation technique ou professionnelle.</p>
      <div class="cta-band-actions">
        <a class="btn btn-gold" href="{{ route('admissions') }}">Voir les admissions</a>
        <a class="btn btn-outline on-dark" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20candidater%20au%20CFTP-MA" target="_blank" rel="noopener">Candidater via WhatsApp</a>
      </div>
    </div>
  </section>
@endsection
