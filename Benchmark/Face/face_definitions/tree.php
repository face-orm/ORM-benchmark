<?php


return [
    "sqlTable"=>"tree",
    "name"=> "tree",
    "class"=> "Benchmark\\Face\\Models\\Tree",

    "elements"=>[
        "id"=>[
            "identifier"=>true,
            "sql"=>[
                "columnName"=> "id",
                "isPrimary" => true
            ]
        ],
        "age",
        "lemons"=>[
            "class"     => "Benchmark\\Face\\Models\\Lemon",
            "relation"  => "hasMany",
            "relatedBy" => "tree",
            "sql"   =>[
                "join"  => ["id"=>"tree_id"]
            ]
        ],

        "childrenTrees"=>[
            "class"     => "Benchmark\\Face\\Models\\Tree",
            "relation"  => "hasManyThrough",
            "relatedBy" => "parentTrees",
            "sql"   =>[
                "join"  => ["id"=>"tree_parent_id"],
                "throughTable" => "tree_has_parent"
            ]
        ],

        "parentTrees"=>[
            "class"     => "Benchmark\\Face\\Models\\Tree",
            "relation"  => "hasManyThrough",
            "relatedBy" => "childrenTrees",
            "sql"   =>[
                "join"  => ["id"=>"tree_child_id"],
                "throughTable" => "tree_has_parent"
            ]
        ]


    ]

];