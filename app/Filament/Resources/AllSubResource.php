<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AllSubResource\Pages;
use App\Filament\Resources\AllSubResource\RelationManagers;
use App\Models\AllSub;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Actions\Action;

class AllSubResource extends Resource
{
    protected static ?string $model = AllSub::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('imdb')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('date'),
                Forms\Components\TextInput::make('author_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('author_id')
                    ->numeric(),
                Forms\Components\TextInput::make('lang')
                    ->maxLength(255),
                Forms\Components\TextInput::make('comment')
                    ->maxLength(255),
                Forms\Components\Textarea::make('releases')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('subscene_link')
                    ->maxLength(255),
                Forms\Components\TextInput::make('fileLink')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('imdb')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lang')
                    ->searchable(),
                Tables\Columns\TextColumn::make('comment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subscene_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fileLink')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('lang')
                    ->multiple()
                    ->options([
                        'english' => 'English',
                        'farsi_persian' => 'Farsi/Persian',
                        'indonesian' => 'Indonesian',
                        'spanish' => 'Spanish',
                        'malay' => 'Malay',
                        'vietnamese' => 'Vietnamese',
                        'french' => 'French',
                        'arabic' => 'Arabic',
                        'italian' => 'Italian',
                        'bengali' => 'Bengali',
                        'finnish' => 'Finnish',
                        'german' => 'German',
                        'sinhala' => 'Sinhala',
                        'korean' => 'Korean',
                        'swedish' => 'Swedish',
                        'norwegian' => 'Norwegian',
                        'burmese' => 'Burmese',
                        'chinese-bg-code' => 'Chinese (BG Code)',
                        'japanese' => 'Japanese',
                        'turkish' => 'Turkish',
                        'czech' => 'Czech',
                        'hindi' => 'Hindi',
                        'bulgarian' => 'Bulgarian',
                        'dutch' => 'Dutch',
                        'portuguese' => 'Portuguese',
                        'brazillian-portuguese' => 'Brazilian Portuguese',
                        'thai' => 'Thai',
                        'greek' => 'Greek',
                        'slovak' => 'Slovak',
                        'big_5_code' => 'Big 5 Code',
                        'russian' => 'Russian',
                        'hebrew' => 'Hebrew',
                        'slovenian' => 'Slovenian',
                        'croatian' => 'Croatian',
                        'hungarian' => 'Hungarian',
                        'icelandic' => 'Icelandic',
                        'romanian' => 'Romanian',
                        'estonian' => 'Estonian',
                        'albanian' => 'Albanian',
                        'polish' => 'Polish',
                        'urdu' => 'Urdu',
                        'serbian' => 'Serbian',
                        'tamil' => 'Tamil',
                        'kurdish' => 'Kurdish',
                        'georgian' => 'Georgian',
                        'tagalog' => 'Tagalog',
                        'malayalam' => 'Malayalam',
                        'nepali' => 'Nepali',
                        'ukranian' => 'Ukrainian',
                        'english-german' => 'English-German',
                        'bosnian' => 'Bosnian',
                        'catalan' => 'Catalan',
                        'lithuanian' => 'Lithuanian',
                        'latvian' => 'Latvian',
                        'macedonian' => 'Macedonian',
                        'kannada' => 'Kannada',
                        'greenlandic' => 'Greenlandic',
                        'cambodian-khmer' => 'Cambodian (Khmer)',
                        'telugu' => 'Telugu',
                        'dutch-english' => 'Dutch-English',
                        'basque' => 'Basque',
                        'swahili' => 'Swahili',
                        'yoruba' => 'Yoruba',
                        'hungarian_english' => 'Hungarian-English',
                        'punjabi' => 'Punjabi',
                        'mongolian' => 'Mongolian',
                        'azerbaijani' => 'Azerbaijani',
                        'pashto' => 'Pashto',
                        'manipuri' => 'Manipuri',
                        'somali' => 'Somali',
                        'bulgarian-english' => 'Bulgarian-English',
                        'sundanese' => 'Sundanese',
                        'belarusian' => 'Belarusian',
                        'esperanto' => 'Esperanto',
                        'armenian' => 'Armenian',
                        'kinyarwanda' => 'Kinyarwanda',

                    ])
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('download')
                    ->url(fn (AllSub $record): string => route('all-subs.download', $record))
                    ->openUrlInNewTab()
            ], position: ActionsPosition::BeforeColumns)
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
            'index' => Pages\ListAllSubs::route('/'),
            'create' => Pages\CreateAllSub::route('/create'),
            'edit' => Pages\EditAllSub::route('/{record}/edit'),
        ];
    }
}
