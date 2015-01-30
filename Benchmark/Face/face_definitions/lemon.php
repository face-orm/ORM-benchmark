<?php

return

    [
        "sqlTable"=>"lemon",
        "name"=> "lemon",
        "class"=> "Benchmark\\Face\\Models\\Lemon",

        "elements"=>[
            "id"=>[
                "type"=>"value",
                "identifier"=>true,
                "sql"=>[
                    "columnName"=> "id",
                    "isPrimary" => true
                ]
            ],
            "tree_id"=>[
                "type"      => "value",
                "sql"=>[
                    "columnName" => "tree_id"
                ]
            ],
            "mature"=>[
                "type"      => "value",
                "sql"=>[
                    "columnName" => "mature"
                ]
            ],
            "tree"=>[
                "class"     =>  "Benchmark\\Face\\Models\\Tree",
                "relatedBy" => "lemons",
                "relation"  => "belongsTo",
                "sql"   =>[
                    "join"  => ["tree_id"=>"id"]
                ]
            ],
            "seeds"=>[
                "class"     => "Benchmark\\Face\\Models\\Seed",
                "relation"  => "hasMany",
                "relatedBy" => "lemon",
                "sql"   =>[
                    "join"  => ["id"=>"lemon_id"]
                ]
            ]

        ]

    ]
;