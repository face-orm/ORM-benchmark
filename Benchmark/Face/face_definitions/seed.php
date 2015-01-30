<?php

return [
    "sqlTable"=>"seed",
    "name"=> "seed",
    "class"=> "Benchmark\\Face\\Models\\Seed",

    "elements"=>[
        "id"=>[
            "identifier"=>true,
            "sql"=>[
                "isPrimary" => true
            ]
        ],
        "lemon_id"=>[
        ],
        "fertil"=>[
        ],
        "lemon"=>[
            "class"     =>  "Benchmark\\Face\\Models\\Lemon",
            "relatedBy" => "seeds",
            "relation"  => "belongsTo",
            "sql"   =>[
                "join"  => ["lemon_id"=>"id"]
            ]
        ]

    ]

];