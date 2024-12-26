<?php

namespace App\Filament\Resources;

use App\Models\Tag;
use Filament\Forms;
use Filament\Tables;
use App\Models\Artikel;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Faker\Provider\ar_EG\Text;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ArtikelResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArtikelResource\RelationManagers;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class ArtikelResource extends Resource
{
    protected static ?string $model = Artikel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //  
                TextInput::make('judul')
                    ->label('Judul')
                    ->required()
                    ->placeholder('Masukkan judul artikel')
                    ->reactive(),
                Select::make('tag')
                    ->multiple()
                    ->options(function () {
                        return \App\Models\Tag::pluck('tag', 'tag')->toArray(); // 'name' untuk ditampilkan, 'id' sebagai nilai
                    }),
                FileUpload::make('banner')
                    ->label('Banner')
                    ->image() // Hanya menerima gambar
                    ->required() // Wajib diisi
                    ->columnSpan('full') // Memperluas elemen agar selebar kolom
                    ->reactive(),

                TextInput::make('slug')
                    ->label('Slug')
                    ->hidden()
                    ->default(fn($get) => Str::slug($get('judul'), '-') . '-' . Str::random(6)),

                RichEditor::make('isi')
                    ->label('Isi')
                    ->required()
                    ->columnSpan('full') // Memperluas elemen agar selebar kolom
                    ->placeholder('Masukkan isi artikel')
                    ->reactive()
                    ->fileAttachmentsDisk('public') // Menyimpan file di disk 'public'
                    ->fileAttachmentsDirectory('artikel') // Menyimpan file di folder 'public/artikel'
                    ->fileAttachmentsVisibility('public'), // Membuat file dapat diakses publik

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('banner')
                    ->label('Banner')
                    ->circular() // Membuat gambar berbentuk lingkaran
                    ->sortable()
                    ->searchable()
                    ->alignment('center') // Menempatkan gambar di tengah
                    ->default(function ($record) {
                        return $record->banner ? $record->banner : 'https://png.pngtree.com/png-clipart/20220125/original/pngtree-question-mark-png-image_7218205.png';
                    }), // Mengaktifkan HTML untuk menampilkan ikon
                TextColumn::make('judul')
                    ->searchable()
                    // ->description(fn(Artikel $record): string => Str::limit(strip_tags($record->isi), 30))
                    ->description(fn(Artikel $record2): string => 'Tag: ' . implode(', ', $record2->tag), position: 'above')
                    ->description(fn(Artikel $record3): string => 'Viewer: ' .  $record3->view_artikel." | Created At: ". $record3->created_at , position: 'below'),


            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListArtikels::route('/'),
            'create' => Pages\CreateArtikel::route('/create'),
            'edit' => Pages\EditArtikel::route('/{record}/edit'),
        ];
    }
}
