<?php

namespace App\Filament\Resources;

use App\Models\Tag;
use Filament\Forms;
use Filament\Tables;
use Faker\Core\Color;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ColorColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use App\Filament\Resources\TagResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TagResource\RelationManagers;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('tag')
                    ->label('Tag')
                    ->required()
                    ->placeholder('Enter name tag')
                    ->reactive(), // Mengaktifkan reaktivitas untuk memicu perubahan

                TextInput::make('slug_tag')
                    ->label('Slug Tag')
                    ->hidden() // Menyembunyikan field dari tampilan
                    ->default(fn ($get) => Str::slug($get('tag'), '_')),
                    
                ColorPicker::make('color')
                    ->label('Color')
                    ->required()
                    ->placeholder('Enter color tag')
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tag')
                    ->label('Tag')
                    ->searchable()
                    ->sortable()
                    ->description(fn(Tag $record3): string => 'Viewer: ' .  $record3->view_tag." | Created At: ". $record3->created_at , position: 'below'),

                ColorColumn::make('color')
                    ->label('Color')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
