<?php



$sheet = array(
               
               array(
                     'story' => "I apologize for cutting off your
                                fascinating diatribe with my blade
                                in your belly. Small talk was
                                never my strong suit.
                                You have spent decades studying the
                                art of combat, refining your skills with
                                relentless vigor. Cunning and patient,
                                your mind plays out each attack and
                                counter before you strike for maximum
                                effect. Though your magical repertoire
                                is extremely limited, the spells you
                                have chosen enhance your already
                                prodigious ability.",
                    'background' => 'Sage',
                    'class' => 'Fighter',
                    'race' => 'Elf',
                    'personality_trait' => "You use polysyllabic words that convey the impression of great erudition",
                    'ideal' => "The path to power and selfimprovement is through knowledge.",
                    'bond' => "Your lifeÕs work is the Tome of Battle, a treatise related to your theories on combat.",
                    'flaw' => "You speak without really thinking through your words, invariably insulting others.",
                    'languages' => array("Common", "Dwarvish", "Draconic", "Elvish", "Halfling"),
                    'speed' => "30 ft",
                    'armor' => 'All, shields',
                    'weapons' => 'Simple, martial',
                    'senses' => "Darkvision, Passive",
                    'trait' => array(
                        "Fey Ancestry. You have advantage on saving throws against being charmed, and magic canÕt put you to sleep",
                        "Darkvision. You can see in dim light within 60 feet of you as if it were bright light, and in darkness as if it were dim light. You canÕt discern color in darkness, only shades of gray.",
                        "Trance. You donÕt require sleep. Instead, you meditate deeply, semiconscious, for 4 hours a day. After resting in this way, you gain the same benefit that a human does from 8 hours of sleep.",
                        "Cantrip. You know the true strike cantrip."
                    ),
                    'equipment' => array(
                        array("Rapier", 1),
                        array("studded leather", 1),
                        array("dart", 20),
                        array("shield", 1),
                        array("scholarÕs pack", 1),
                        array("fishing tackle", 1),
                        array(' book onfighting techniques', 1),
                        array("spellbook", 1)
                    ),
                    "gp" => 64,
                    "sp" => 8
                     
                ),
               
               
               array(
                    'features' => array(
                        array(
                              "Fighting Style: Dueling",
                              "When you are wielding a melee weapon in one hand and no other weapons, you gain a +2 bonus to damage rolls with that weapon."
                        ),
                        array(
                            "Second Wind",
                            "On your turn, you can use a bonus action to regain 1d10 + 1 hit points. Once you use this feature, you must finish a short or long rest before you can use it again"
                        )
                    ),
                    'abilties' => array(
                        'str' => 10,
                        'dex' => 16,
                        'con' => 13,
                        'int' => 16,
                        'wis' => 12,
                        'cha' => 8
                    ),
                    'proficiency' => 2,
                    'hit_point' => 11,
                    'hit_dice' => "1d10",
                    'armor' => 17,
                    'actions' => array(
                        array(
                            'name' => "Rapier",
                            'atk_bonus' => 5,
                            'damage' => "1d8 + 5"
                        ),
                        array(
                            'name' => "Dart",
                            'atk_bonus' => 5,
                            'damage' => "1d4 + 3"
                        ),
                        
                    ),
                    'options' => array(
                        array(
                            "Fey Ancestry",
                            "Elf trait"
                        ),
                        array(
                            "Trance",
                            "Elf trait"
                        )
                    )
                    
                    
               )
               
               
               
               
               
               
               );



?>