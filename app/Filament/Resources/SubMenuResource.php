<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Menu;
use Filament\Tables;
use App\Models\SubMenu;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SubMenuResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubMenuResource\RelationManagers;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class SubMenuResource extends Resource
{
    protected static ?string $model = SubMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('menu')
                    ->options(function () {
                        return Menu::pluck('menu', 'menu')->toArray(); // 'name' untuk ditampilkan, 'id' sebagai nilai
                    })
                    ->label('Menu')
                    ->columnSpanFull(),
                TextInput::make('judulsub')
                    ->label('Judul Sub Menu')
                    ->placeholder('Masukan Judul Sub Menu')
                    ->columnSpanFull(),
                TextInput::make('submenu')
                    ->label('Sub Menu')
                    ->placeholder('Masukan Nama Sub Menu')
                    ->prefix('/')
                    ->columnSpanFull(),
                    RichEditor::make('isi')
                    ->label('Isi')
                    ->required()
                    ->columnSpan('full') // Memperluas elemen agar selebar kolom
                    ->placeholder('Masukkan Deskripsi Sub Menu')
                    ->reactive()
                    ->fileAttachmentsDisk('public') // Menyimpan file di disk 'public'
                    ->fileAttachmentsDirectory('submenu') // Menyimpan file di folder 'public/artikel'
                    ->fileAttachmentsVisibility('public'), // Membuat file dapat diakses publik

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('menu')
                    ->label('Menu')
                    ->searchable()
                    ->sortable()
                    ->description(fn(SubMenu $record2): string => 'Complete Menu: '.$record2->menu."".$record2->submenu , position: 'above')
                    ->description(fn(SubMenu $record3): string => substr(strip_tags(html_entity_decode($record3->isi)), 0, 50), position: 'below'),


                
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
            'index' => Pages\ListSubMenus::route('/'),
            'create' => Pages\CreateSubMenu::route('/create'),
            'edit' => Pages\EditSubMenu::route('/{record}/edit'),
        ];
    }
}
