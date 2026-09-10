<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryPhotoResource\Pages;
use App\Models\GalleryPhoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryPhotoResource extends Resource
{
    protected static ?string $model = GalleryPhoto::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Galerie Photo';

    protected static ?string $modelLabel = 'Photo';

    protected static ?string $pluralModelLabel = 'Photos de la galerie';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Photo & Informations')
                    ->schema([
                        Forms\Components\FileUpload::make('image_path')
                            ->label('Fichier image')
                            ->image()
                            ->disk('public')
                            ->directory('gallery')
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(5120) // 5MB
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Formats acceptés : JPG, PNG, WebP. Poids max : 5 Mo. Optimisé et redimensionné automatiquement.'),

                        Forms\Components\Select::make('category')
                            ->label('Catégorie')
                            ->options([
                                'ateliers' => 'Ateliers',
                                'filieres' => 'Filières',
                                'vie' => 'Vie du centre',
                                'evenements' => 'Événements',
                            ])
                            ->required(),

                        Forms\Components\Select::make('tile_size')
                            ->label('Format de la tuile dans la grille')
                            ->options([
                                'normal' => 'Normal (1x1)',
                                'wide' => 'Large (2 colonnes)',
                                'tall' => 'Haute (2 lignes)',
                            ])
                            ->default('normal')
                            ->required()
                            ->helperText('Permet de varier la disposition visuelle dans la grille mosaïque.'),

                        Forms\Components\TextInput::make('caption')
                            ->label('Légende / Titre de la photo')
                            ->maxLength(255)
                            ->columnSpanFull()
                            ->helperText('Texte affiché dans la lightbox agrandie.'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order', 'asc')
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Aperçu')
                    ->disk('public')
                    ->square(),

                Tables\Columns\TextColumn::make('category')
                    ->label('Catégorie')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'ateliers' => 'Ateliers',
                        'filieres' => 'Filières',
                        'vie' => 'Vie du centre',
                        'evenements' => 'Événements',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'ateliers' => 'primary',
                        'filieres' => 'info',
                        'vie' => 'success',
                        'evenements' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('caption')
                    ->label('Légende')
                    ->placeholder('Sans légende')
                    ->limit(40),

                Tables\Columns\TextColumn::make('tile_size')
                    ->label('Format')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'normal' => 'Normal',
                        'wide' => 'Large',
                        'tall' => 'Haute',
                        default => $state,
                    })
                    ->color('gray'),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Ordre')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Catégorie')
                    ->options([
                        'ateliers' => 'Ateliers',
                        'filieres' => 'Filières',
                        'vie' => 'Vie du centre',
                        'evenements' => 'Événements',
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
            'index' => Pages\ListGalleryPhotos::route('/'),
            'create' => Pages\CreateGalleryPhoto::route('/create'),
            'edit' => Pages\EditGalleryPhoto::route('/{record}/edit'),
        ];
    }
}
