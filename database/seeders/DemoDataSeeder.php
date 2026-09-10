<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\GalleryPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Articles de démonstration
        $articles = [
            [
                'title' => 'Ouverture des inscriptions pour la nouvelle rentrée 2026',
                'slug' => 'ouverture-des-inscriptions-pour-la-nouvelle-rentree-2026',
                'excerpt' => 'Les dossiers de candidature pour le cycle long (CAP/BT) et le cycle court modulaire sont officiellement ouverts.',
                'body' => '<p>Le <strong>Centre de Formation Technique et Professionnelle Maria Auxiliadora (CFTP-MA)</strong> a le plaisir d\'annoncer l\'ouverture officielle des inscriptions pour l\'année académique 2026-2027.</p><p>Les jeunes âgés de 16 à 25 ans souhaitant acquérir un métier d\'avenir sont invités à retirer leurs fiches de candidature au secrétariat du centre situé à Akodésséwa, Lomé.</p><h3>Filières disponibles</h3><ul><li><strong>Cycle long (3 ans + stage) :</strong> Électricité d\'équipement, Construction métallique, Électrotechnique, Maintenance informatique et réseau.</li><li><strong>Cycle court (6 mois + stage) :</strong> Esthétique, Décoration d\'intérieur, Secrétariat bureautique, Initiation à l\'informatique.</li></ul><p>Pour toute information complémentaire, veuillez contacter le secrétariat par WhatsApp ou par téléphone.</p>',
                'cover_image' => null,
                'status' => 'published',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Journée portes ouvertes au CFTP-MA',
                'slug' => 'journee-portes-ouvertes-au-cftp-ma',
                'excerpt' => 'Une occasion pour les familles et futurs apprenants de visiter les ateliers et d\'échanger avec les formateurs.',
                'body' => '<p>Le CFTP-MA organise une <strong>Journée Portes Ouvertes</strong> le mois prochain au sein de ses ateliers à Akodésséwa.</p><p>Cet événement permettra aux parents, élèves et passionnés de découvrir concrètement les équipements pédagogiques, d\'assister à des démonstrations pratiques en atelier et de poser toutes leurs questions sur les perspectives professionnelles après la formation.</p><blockquote>"Former des jeunes compétents et responsables, au service du développement du Togo."</blockquote><p>L\'entrée est libre et gratuite pour tous.</p>',
                'cover_image' => null,
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Renforcement des partenariats avec les entreprises industrielles',
                'slug' => 'renforcement-des-partenariats-avec-les-entreprises-industrielles',
                'excerpt' => 'De nouveaux accords de stage et d\'insertion professionnelle ont été signés avec des acteurs économiques de la zone portuaire.',
                'body' => '<p>Dans le cadre de sa mission d\'insertion professionnelle des jeunes diplômés, la direction du CFTP-MA a rencontré plusieurs dirigeants d\'entreprises de la région maritime.</p><p>Ces partenariats garantissent des places de stage pratique en entreprise pour les apprenants de 3ème année et favorisent l\'embauche directe à l\'issue de l\'obtention du CAP et du BT.</p><p>Nous remercions nos partenaires pour leur confiance renouvelée en la qualité de la formation salésienne dispensée au CFTP-MA.</p>',
                'cover_image' => null,
                'status' => 'published',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Cérémonie de remise des attestations modulaires',
                'slug' => 'ceremonie-de-remise-des-attestations-modulaires',
                'excerpt' => 'Félicitations aux 45 lauréats des formations modulaires en esthétique et secrétariat.',
                'body' => '<p>Une ambiance festive a régné au centre lors de la remise solennelle des attestations de fin de formation modulaire pour les apprenants des filières tertiaires.</p><p>Bravo à toutes et à tous pour votre persévérance et vos compétences démontrées tout au long de ce cycle de 6 mois.</p>',
                'cover_image' => null,
                'status' => 'published',
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($articles as $data) {
            Article::updateOrCreate(['slug' => $data['slug']], $data);
        }

        // Photos de galerie de démonstration
        $photos = [
            [
                'image_path' => 'gallery/sample-ateliers-1.jpg',
                'category' => 'ateliers',
                'caption' => 'Travaux pratiques d\'électricité en atelier',
                'tile_size' => 'tall',
                'sort_order' => 1,
            ],
            [
                'image_path' => 'gallery/sample-vie-1.jpg',
                'category' => 'vie',
                'caption' => 'Rassemblement matinal dans la cour du centre',
                'tile_size' => 'normal',
                'sort_order' => 2,
            ],
            [
                'image_path' => 'gallery/sample-filieres-1.jpg',
                'category' => 'filieres',
                'caption' => 'Atelier de construction métallique et soudure',
                'tile_size' => 'wide',
                'sort_order' => 3,
            ],
            [
                'image_path' => 'gallery/sample-evenements-1.jpg',
                'category' => 'evenements',
                'caption' => 'Journée de célébration de la fête de Don Bosco',
                'tile_size' => 'normal',
                'sort_order' => 4,
            ],
            [
                'image_path' => 'gallery/sample-ateliers-2.jpg',
                'category' => 'ateliers',
                'caption' => 'Maintenance des micro-ordinateurs et configuration réseau',
                'tile_size' => 'wide',
                'sort_order' => 5,
            ],
            [
                'image_path' => 'gallery/sample-filieres-2.jpg',
                'category' => 'filieres',
                'caption' => 'Formation modulaire en soins esthétiques',
                'tile_size' => 'normal',
                'sort_order' => 6,
            ],
            [
                'image_path' => 'gallery/sample-vie-2.jpg',
                'category' => 'vie',
                'caption' => 'Moment de convivialité entre apprenants',
                'tile_size' => 'normal',
                'sort_order' => 7,
            ],
            [
                'image_path' => 'gallery/sample-evenements-2.jpg',
                'category' => 'evenements',
                'caption' => 'Visite d\'entreprises partenaires au centre',
                'tile_size' => 'tall',
                'sort_order' => 8,
            ],
        ];

        foreach ($photos as $photo) {
            GalleryPhoto::updateOrCreate(
                ['image_path' => $photo['image_path']],
                $photo
            );
        }
    }
}
