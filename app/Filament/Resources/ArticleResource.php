<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Actualités';

    protected static ?string $modelLabel = 'Article';

    protected static ?string $pluralModelLabel = 'Articles';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Contenu de l\'article')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Titre de l\'article')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, ?string $state, Set $set) {
                                if ($operation === 'create' || empty($state)) {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->unique(Article::class, 'slug', ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Identifiant unique dans l\'URL (ex: visite-des-ateliers-2026).'),

                        Forms\Components\Textarea::make('excerpt')
                            ->label('Résumé court (Extrait)')
                            ->required()
                            ->rows(3)
                            ->maxLength(300)
                            ->helperText('Résumé affiché sur les cartes de la page d\'accueil et la liste des actualités (~200 caractères).'),

                        Forms\Components\RichEditor::make('body')
                            ->label('Corps de l\'article')
                            ->required()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('articles/attachments')
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Image & Publication')
                    ->schema([
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Image de couverture')
                            ->image()
                            ->disk('public')
                            ->directory('articles')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(5120) // 5MB
                            ->helperText('Formats: JPG, PNG, WebP. Taille maximale : 5 Mo. Redimensionnée automatiquement.'),

                        Forms\Components\Select::make('status')
                            ->label('Statut de publication')
                            ->options([
                                'draft' => 'Brouillon',
                                'published' => 'Publié',
                            ])
                            ->default('draft')
                            ->required(),

                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Date et heure de publication')
                            ->default(now())
                            ->required(fn (Forms\Get $get): bool => $get('status') === 'published')
                            ->helperText('L\'article ne sera visible que si la date est passée et le statut est "Publié".'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('cover_image')
                    ->label('Couverture')
                    ->disk('public')
                    ->square()
                    ->defaultImageUrl(asset('images/hero-apprenants.jpg')),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable()
                    ->limit(45),

                Tables\Columns\TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'published' => 'success',
                        'draft' => 'gray',
                        default => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'published' => 'Publié',
                        'draft' => 'Brouillon',
                        default => $state,
                    }),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Date de publication')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filtrer par statut')
                    ->options([
                        'published' => 'Publié',
                        'draft' => 'Brouillon',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
