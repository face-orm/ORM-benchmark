<?php

return [

    [
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

    ],

    [
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

    ],


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



];