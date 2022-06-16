@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="container">
            <h1>Order {{ app('request')->input('ordernumber') }} </h1>
            <form method="POST" action="{{ route('backlog.store') }}">
                @csrf
                @php
                    // 'bottom_deck' => [ // mutueel exclusief? radio of checkboxes i.i.g.?
                    $fields = [
                            [
                                'name' => 'smth',
                                'content' => 'smth',
                                'fields' => [
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'ht',
                                        'content' => 'HT / Non HT',
                                        'type' => 'switch',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'option_1' => 'HT',
                                            'option_2' => 'Non HT',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'date',
                                        'content' => 'Datum',
                                        'type' => 'date',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'Week',
                                        'content' => 'Week',
                                        'type' => 'number',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'name',
                                        'content' => 'Naam',
                                        'type' => 'input',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'top_denk',
                                'content' => 'Bovendek',
                                'fields' => [
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'size',
                                        'content' => 'Afmeting',
                                        'type' => 'slider',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'plank_count',
                                        'content' => 'Aantal planken',
                                        'type' => 'number',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'spacing',
                                        'content' => 'Spaties',
                                        'type' => 'number',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'clamps',
                                        'content' => 'Klampen',
                                        'type' => 'number',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'overhang',
                                        'content' => 'Overstek',
                                        'type' => 'number',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'blocks',
                                'content' => 'Klossen',
                                'fields' => [
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'type',
                                        'content' => 'Soort',
                                        'type' => 'radio',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'option_1' => 'option_1',
                                            'option_2' => 'option_2',
                                            'option_3' => 'option_3',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'beam',
                                        'content' => 'Balk',
                                        'type' => 'switch',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'option_1' => 'option_1',
                                            'option_2' => 'option_2',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'dimension_1',
                                        'content' => 'Afmeting 1',
                                        'type' => 'number',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'dimension_2',
                                        'content' => 'Afmeting 2',
                                        'type' => 'number',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'bottom_deck',
                                'content' => 'Onderdek',
                                'fields' => [
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'bridge',
                                        'content' => 'Brug',
                                        'type' => 'switch',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'option_1' => 'option_1',
                                            'option_2' => 'option_2',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'striger',
                                        'content' => 'Rondloper',
                                        'type' => 'switch',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'option_1' => 'option_1',
                                            'option_2' => 'option_2',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'crossdeck',
                                        'content' => 'Kruisdek',
                                        'type' => 'switch',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'option_1' => 'option_1',
                                            'option_2' => 'option_2',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'dimension_2',
                                        'content' => 'Afmeting 2',
                                        'type' => 'number',
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                ],
                            ],
                            [
                                'name' => 'miscellaneous',
                                'content' => 'Overig',
                                'fields' => [
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'chamfer',
                                        'content' => 'Hoeken zaag',
                                        'type' => 'switch',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'option_1' => 'option_1',
                                            'option_2' => 'option_2',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'stamps',
                                        'content' => 'Stemples',
                                        'type' => 'switch',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'option_1' => 'option_1',
                                            'option_2' => 'option_2',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'strap_mark',
                                        'content' => 'Strappen-Markeren',
                                        'type' => 'switch',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'option_1' => 'option_1',
                                            'option_2' => 'option_2',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                    [
                                        '1DrJM8pitM9muK3QKXcJ' => 'WrL69d3VUK7XkHPImCOO',
                                        'name' => 'nails',
                                        'content' => 'Spijkers',
                                        'type' => 'radio',
                                        'mutually_exclusive' => 'true',
                                        'options' => [
                                            'bd' => 'BD',
                                            'td' => 'TD',
                                            'od' => 'OD',
                                        ],
                                        'FWmB3Q8tHvaD6C25TAuz' => 'D8ZsaTu1wla8x9cD54vI',
                                    ],
                                ],
                            ],
                    ];
                    $fieldTypes = [
                        'input' => [
                            'class' => 'input',
                            'type' => 'input',
                        ],
                        'textarea' => '',
                        'number' => '',
                        'radio' => '',
                        'checkboxes' => '',
                    ];
                @endphp

                @php
                    $fieldTypes = [
                        'input' => [
                            'class' => 'input',
                            'element' => 'input',
                            'type' => 'input',
                        ],
                        'textarea' => [
                            'class' => 'textarea',
                            'element' => 'textarea',
                            'type' => 'textarea',
                        ],
                        'radio' => [
                            'class' => 'radio',
                            'element' => 'qqwsazx',
                            'type' => 'option',
                        ],
                        'checkboxes' => [
                            'class' => 'checkboxes',
                            'element' => 'qqwsazx',
                            'type' => 'option',
                        ],
                        'switch' => [
                            'class' => 'switch',
                            'element' => 'qqwsazx',
                            'type' => 'switch',
                        ],
                        'number' => [
                            'class' => 'input',
                            'element' => 'input',
                            'type' => 'number',
                        ],
                        'date' => [
                            'class' => 'input',
                            'element' => 'input',
                            'type' => 'date',
                        ],
                        'slider' => [
                            'class' => 'input',
                            'element' => 'input',
                            'type' => 'input',
                        ],
                    ];
                    $array = [2, 3, 4, 5, 6];
                @endphp

                @foreach ($fields as $section)
                    <div class="checlistSection">
                        <div class="checklistSectionTitle">{{ $section['content'] }}</div>
                        <div class="checklistSectionFields">
                            @foreach ($section['fields'] as $field)
                                <div class="field">
                                    <label class="{{ $fieldTypes[$field['type']]['class'] }}"
                                           for="{{ $field['name'] }}">
                                        {{ $field['content'] }}
                                    </label>
                                    <div class="control">

                                        @empty ($field['options'])
                                            @switch ($fieldTypes[$field['type']]['element'])
                                                @case ('input')
                                                    <input
                                                        @class ([
                                                            'input',
                                                            'is-danger' => $backlogs->get($field['name']),
                                                        ])
                                                        type="{{ $fieldTypes[$field['type']]['type'] }}"
                                                        id="{{ $field['name'] }}"
                                                        name="{{ $field['name'] }}"
                                                        value="{{ $backlogs->any() ? old($field['name']) : '' }}"
                                                    >
                                                    @break
                                                @case ('textarea')
                                                    <div class="grow-wrap">
                                                        <textarea
                                                            @class ([
                                                                '{{ $fieldTypes[$field["type"]] }}',
                                                                'is-danger' => $backlogs->get($field['name']),
                                                            ])
                                                            id="{{ $field['name'] }}"
                                                            name="{{ $field['name'] }}"
                                                            oninput="this.parentNode.dataset.replicatedValue = this.value">
                                                            {{ ($backlogs->any() ? old($field['name']) : '') }}
                                                        </textarea>
                                                        <script>document.querySelector('#notes > div > textarea').parentNode.dataset.replicatedValue = document.querySelector('#notes > div > textarea').value;</script>
                                                    </div>
                                                    @break
                                                @default
                                                    {{ dd($fieldTypes[$field['type']]['type']) }}
                                            @endswitch
                                        @endempty
                                        @isset ($field['options'])
                                            @if ($field['mutually_exclusive'])
                                                <div id="radios">
                                                    <input id="rad1" type="radio" name="radioBtn" checked>
                                                    <label class="label-text" for="rad1">First Option</label>
                                                    <label class="labels" for="rad1"></label>

                                                    <input id="rad2" type="radio" name="radioBtn">
                                                    <label class="label-text" for="rad1">Second Option</label>
                                                    <label class="labels" for="rad2"></label>

                                                    <div id="bckgrnd"></div>
                                                </div>
                                                {{-- studff --}}
                                                @foreach ($field['options'] as $optionKey=>$option)
                                                    {{-- repeating stuff --}}
                                                @endforeach
                                                {{-- more stuff --}}
                                            @else
                                                @foreach ($field['options'] as $optionKey=>$option)
                                                    @switch(count($field['options']))
                                                        @case(1)
                                                            {{-- checkmark? toggle switch?--}}
                                                            <label class="toggle" for="myToggle">
                                                                <input class="toggle__input" name="" type="checkbox"
                                                                       id="myToggle">
                                                                <div class="toggle__fill"></div>
                                                            </label>
                                                            @break
                                                        @case (2)
                                                            2
                                                            {{-- ios two option switch? --}}
                                                            <label class="{{ $fieldTypes[$field['type']]['class'] }}">
                                                                <input type="{{ $field['type'] }}"
                                                                       name="{{ $field['name'] }}"
                                                                       value="{{ $optionKey }}">
                                                                {{ $option }}
                                                            </label>

                                                        @default
                                                            default
                                                            <label class="{{ $fieldTypes[$field['type']]['class'] }}">
                                                                <input type="{{ $field['type'] }}"
                                                                       name="{{ $field['name'] }}"
                                                                       value="{{ $optionKey }}">
                                                                {{ $option }}
                                                            </label>
                                                            @break
                                                    @endswitch
                                                @endforeach
                                            @endif
                                        @endisset

                                    </div>
                                    @error($field['name'])
                                    @foreach ($backlogs->get($field['name']) as $ewwor)
                                        <p class="help is-danger">{{ $ewwor[$loop->index] }}</p>
                                    @endforeach
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <input type="submit" value="Submit" class="button is-link">
                <a href="{{route('backlog.index')}}">
                    <button type="button" class="button is-link-light">Cancel</button>
                </a>

            </form>
        </div>
    </section>
@endsection
