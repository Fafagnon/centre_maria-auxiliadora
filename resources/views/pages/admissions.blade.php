@extends('layouts.app')

@section('title', 'Admissions — CFTP-MA | Centre de Formation Technique et Professionnelle Maria Auxiliadora')
@section('meta_description', 'Comment candidater au CFTP-MA à Lomé : conditions d\'admission, pièces à fournir et étapes du dossier pour rejoindre le cycle long ou le cycle court.')

@section('content')
  <!-- ============ HERO ============ -->
  <section class="page-hero">
    <div class="wrap">
      <div class="page-hero-text">
        <span class="kicker">Admissions</span>
        <h1>Rejoindre le CFTP-MA</h1>
        <p class="lead">Le centre accueille chaque année de nouveaux apprenants dans ses filières de cycle long et de cycle court. Voici les conditions et les étapes pour déposer votre candidature.</p>
        <div class="page-hero-ctas">
          <a class="btn btn-primary" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20candidater%20au%20CFTP-MA" target="_blank" rel="noopener">Candidater via WhatsApp</a>
          <a class="btn btn-outline" href="{{ route('home') }}#formations">Voir nos formations</a>
        </div>
      </div>
      <div class="page-hero-figure">
        <div class="img-frame radius-a">
          <span class="img-frame__label">Photo à ajouter<br><code>images/admissions-hero.jpg</code></span>
          <img src="{{ asset('images/admissions-hero.jpg') }}" alt="Accueil des candidats au CFTP-MA" loading="lazy" onerror="this.style.display='none'">
        </div>
      </div>
    </div>
  </section>

  <!-- ============ CONDITIONS ============ -->
  <section class="section cream">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">Conditions d'admission</span>
        <h2 class="section-title">Qui peut candidater ?</h2>
      </div>
      <div class="cond-grid">
        <div class="cond-card">
          <span class="tag">Cycle long</span>
          <h3>Électricité, construction métallique, électrotechnique, maintenance informatique</h3>
          <ul class="cond-list">
            <li><strong>Âge</strong> 16 à 25 ans</li>
            <li><strong>Niveau</strong> Classe de 3ème ou niveau équivalent</li>
            <li><strong>Durée</strong> 3 ans de formation + 3 mois de stage</li>
            <li><strong>Diplôme</strong> CAP ou BT selon la filière</li>
          </ul>
        </div>
        <div class="cond-card alt">
          <span class="tag">Cycle court</span>
          <h3>Esthétique, décoration d'intérieur, secrétariat, informatique</h3>
          <ul class="cond-list">
            <li><strong>Âge</strong> 16 à 25 ans</li>
            <li><strong>Niveau</strong> Savoir lire et écrire couramment</li>
            <li><strong>Durée</strong> 6 mois de formation + 3 mois de stage</li>
            <li><strong>Diplôme</strong> Attestation de formation modulaire</li>
          </ul>
        </div>
      </div>
      <p class="section-note">Conditions données à titre indicatif — à valider avec l'équipe pédagogique avant mise en ligne définitive.</p>
    </div>
  </section>

  <!-- ============ ÉTAPES ============ -->
  <section class="section">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">Le processus</span>
        <h2 class="section-title">Comment candidater</h2>
      </div>
      <div class="steps-list">
        <div class="step-item">
          <div class="step-num">1</div>
          <h3>Prendre contact</h3>
          <p>Contactez le centre par WhatsApp ou téléphone en précisant la filière qui vous intéresse.</p>
        </div>
        <div class="step-item">
          <div class="step-num">2</div>
          <h3>Constituer le dossier</h3>
          <p>Réunissez les pièces demandées (voir liste ci-dessous) pour votre candidature.</p>
        </div>
        <div class="step-item">
          <div class="step-num">3</div>
          <h3>Déposer le dossier</h3>
          <p>Déposez votre dossier complet au centre, Bd Mobutu Sese Seko, Akodésséwa, Lomé.</p>
        </div>
        <div class="step-item">
          <div class="step-num">4</div>
          <h3>Confirmation</h3>
          <p>Vous recevez la confirmation de votre inscription et les informations pratiques de rentrée.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ DOCUMENTS ============ -->
  <section class="section cream">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">Pièces à fournir</span>
        <h2 class="section-title">Constituer votre dossier</h2>
      </div>
      <div class="doc-list">
        <div class="doc-item">
          <span class="doc-check"><svg viewBox="0 0 24 24"><polyline points="4,13 9,18 20,6"/></svg></span>
          <span>Acte de naissance ou extrait récent</span>
        </div>
        <div class="doc-item">
          <span class="doc-check"><svg viewBox="0 0 24 24"><polyline points="4,13 9,18 20,6"/></svg></span>
          <span>Copie du dernier diplôme ou certificat de scolarité</span>
        </div>
        <div class="doc-item">
          <span class="doc-check"><svg viewBox="0 0 24 24"><polyline points="4,13 9,18 20,6"/></svg></span>
          <span>4 photos d'identité récentes</span>
        </div>
        <div class="doc-item">
          <span class="doc-check"><svg viewBox="0 0 24 24"><polyline points="4,13 9,18 20,6"/></svg></span>
          <span>Certificat médical d'aptitude</span>
        </div>
        <div class="doc-item">
          <span class="doc-check"><svg viewBox="0 0 24 24"><polyline points="4,13 9,18 20,6"/></svg></span>
          <span>Frais de dossier (montant communiqué au dépôt)</span>
        </div>
        <div class="doc-item">
          <span class="doc-check"><svg viewBox="0 0 24 24"><polyline points="4,13 9,18 20,6"/></svg></span>
          <span>Autorisation parentale pour les mineurs</span>
        </div>
      </div>
      <p class="section-note">Liste indicative — à confirmer et ajuster avec le secrétariat du centre avant mise en ligne définitive.</p>
    </div>
  </section>

  <!-- ============ FAQ ============ -->
  <section class="section">
    <div class="wrap">
      <div class="section-head">
        <span class="kicker">Questions fréquentes</span>
        <h2 class="section-title">Avant de candidater</h2>
      </div>
      <div class="faq-list">
        <div class="faq-item is-open">
          <button class="faq-q" type="button"><span>Combien coûte la formation ?</span><span class="plus"></span></button>
          <div class="faq-a"><p>Les frais varient selon la filière et le cycle choisi. Contactez le centre par WhatsApp ou téléphone pour connaître le détail applicable à votre situation.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q" type="button"><span>Puis-je candidater sans le niveau scolaire requis ?</span><span class="plus"></span></button>
          <div class="faq-a"><p>Le niveau demandé dépend de la filière. L'équipe du centre étudie chaque dossier et peut vous orienter vers le cycle le plus adapté à votre profil.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q" type="button"><span>Quand ont lieu les prochaines rentrées ?</span><span class="plus"></span></button>
          <div class="faq-a"><p>Le calendrier est communiqué avant chaque rentrée. Contactez le centre pour connaître les prochaines dates d'inscription.</p></div>
        </div>
        <div class="faq-item">
          <button class="faq-q" type="button"><span>Le centre aide-t-il à trouver un stage ou un emploi ?</span><span class="plus"></span></button>
          <div class="faq-a"><p>Chaque filière du cycle long comprend une période de stage en entreprise, et le centre s'appuie sur son réseau de partenaires pour accompagner les apprenants.</p></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ CTA FINALE ============ -->
  <section class="section dark cta-band">
    <div class="wrap">
      <h2>Prêt à commencer votre formation ?</h2>
      <p>Écrivez-nous dès maintenant sur WhatsApp pour être accompagné dans votre candidature, ou appelez directement le secrétariat du centre.</p>
      <div class="cta-band-actions">
        <a class="btn btn-gold" href="https://wa.me/22893007790?text=Bonjour%2C%20je%20souhaite%20candidater%20au%20CFTP-MA" target="_blank" rel="noopener">Candidater via WhatsApp</a>
        <a class="btn btn-outline on-dark" href="tel:+22897668608">Appeler le centre</a>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script>
(function(){
  document.querySelectorAll('.faq-item').forEach(function(item){
    var btn = item.querySelector('.faq-q');
    btn.addEventListener('click', function(){
      var wasOpen = item.classList.contains('is-open');
      document.querySelectorAll('.faq-item').forEach(function(i){ i.classList.remove('is-open'); });
      if(!wasOpen) item.classList.add('is-open');
    });
  });
})();
</script>
@endpush
