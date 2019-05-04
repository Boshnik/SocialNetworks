<?php

return [
    'SocialNetworks' => [
        'file' => 'socialnetworks',
        'description' => 'Сниппет для вывода соц. сетей.',
        'properties' => [
            'tplOuter' => [
                'type' => 'textfield',
                'value' => '@INLINE <ul class="list-inline">{$wrapper}</ul>',
            ],
            'tpl' => [
                'type' => 'textfield',
                'value' => '@INLINE <li class="list-inline-item"><a href="{$link}" target="_blank" title="{$name}"><i class="fab fa-{$name}"></i></a></li>',
            ],
            'sortby' => [
                'type' => 'textfield',
                'value' => 'name',
            ],
            'sortdir' => [
                'type' => 'list',
                'options' => [
                    ['text' => 'ASC', 'value' => 'ASC'],
                    ['text' => 'DESC', 'value' => 'DESC'],
                ],
                'value' => 'ASC',
            ],
            'limit' => [
                'type' => 'numberfield',
                'value' => 0,
            ],
            'outputSeparator' => [
                'type' => 'textfield',
                'value' => "\n",
            ],
            'toPlaceholder' => [
                'type' => 'combo-boolean',
                'value' => false,
            ],
            'services' => [
                'type' => 'textfield',
                'value' => '',
            ],
            'fontawesome' => [
                'type' => 'list',
                'options' => [
                    ['text' => 'webfont', 'value' => 'webfont'],
                    ['text' => 'svg', 'value' => 'svg'],
                    ['text' => 'none', 'value' => 'none'],
                ],
                'value' => 'webfont',
            ]
        ],
    ],
];