<?php

namespace Tests;

use Dream\Jacs;

class JacsTest extends \PHPUnit\Framework\TestCase
{
    public function testIsCode()
    {
        $this->assertTrue(Jacs::isCode('A000'));
        $this->assertTrue(Jacs::isCode('X990'));
        $this->assertTrue(Jacs::isCode('L243'));
        $this->assertFalse(Jacs::isCode('L233'));
    }

    public function testGetByCoding()
    {
        $this->assertEquals([[
            1 => 'A',
            2 => 9,
            3 => 9,
            4 => 0,
            'level' => 3,
            'name' => 'Medicine & dentistry not elsewhere classified',
            'description' => 'Miscellaneous grouping for related subjects which do not fit into the other Others in Medicine and Dentistry categories. To be used sparingly.',
            'deprecated' => 0,
        ]], Jacs::getByCoding('A990'));

        $this->assertEquals([[
            1 => 'H',
            2 => 4,
            3 => 0,
            4 => 0,
            'level' => 2,
            'name' => 'Aerospace engineering',
            'description' => 'The study of the principles of engineering as they apply to aircraft and spacecraft in the atmosphere and in space. Involves the study and application of specialist mathematics.',
            'deprecated' => 0,
        ]], Jacs::getByCoding('H400'));

        $this->assertEquals([
            [
                1 => 'B',
                2 => 5,
                3 => 0,
                4 => 0,
                'level' => 2,
                'name' => 'Ophthalmics',
                'description' => 'The study of the eye, disruption to sight and diseases of the eye. Also includes treatment of eye disorders.',
                'deprecated' => 0,
            ],[
                1 => 'G',
                2 => 7,
                3 => 0,
                4 => 0,
                'level' => 2,
                'name' => 'Artificial Intelligence',
                'description' => 'The study of principles and techniques for the computer-based simulation and modelling of intelligent animal behaviour patterns.',
                'deprecated' => 1,
            ]
        ], Jacs::getByCoding('BG57'));
    }

    public function testReturnType()
    {
        $this->assertEquals('and', Jacs::returnType('BG57'));
        $this->assertEquals('with', Jacs::returnType('B5G7'));
        $this->assertEquals('full', Jacs::returnType('X350'));
        $this->assertNull(Jacs::returnType(null));
    }

    public function testAssertMatrixTree()
    {
        $this->assertEquals(array (
            'A' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Medicine and Dentistry',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Pre-clinical medicine',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Pre-clinical dentistry',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Clinical medicine',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Clinical dentistry',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in medicine & dentistry',
                                ),
                            9 =>
                                array (
                                    0 => 'Medicine & dentistry not elsewhere classified',
                                ),
                        ),
                ),
            'B' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Subjects Allied to Medicine',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Anatomy, physiology & pathology',
                                ),
                            1 =>
                                array (
                                    0 => 'Anatomy',
                                ),
                            2 =>
                                array (
                                    0 => 'Physiology',
                                    1 => 'Clinical physiology',
                                ),
                            3 =>
                                array (
                                    0 => 'Pathology',
                                    1 => 'Cellular pathology',
                                    2 => 'Pathobiology',
                                ),
                            4 =>
                                array (
                                    0 => 'Neuroscience',
                                ),
                            6 =>
                                array (
                                    0 => 'Physiotherapy',
                                ),
                            7 =>
                                array (
                                    0 => 'Podiatry',
                                ),
                            9 =>
                                array (
                                    0 => 'Anatomy, physiology & pathology not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Pharmacology, toxicology & pharmacy',
                                ),
                            1 =>
                                array (
                                    0 => 'Pharmacology',
                                ),
                            2 =>
                                array (
                                    0 => 'Toxicology',
                                ),
                            3 =>
                                array (
                                    0 => 'Pharmacy',
                                ),
                            9 =>
                                array (
                                    0 => 'Pharmacology, toxicology & pharmacy not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Complementary medicines, therapies & well-being',
                                ),
                            1 =>
                                array (
                                    0 => 'Osteopathy',
                                ),
                            2 =>
                                array (
                                    0 => 'Chiropractic',
                                ),
                            3 =>
                                array (
                                    0 => 'Chiropody',
                                ),
                            4 =>
                                array (
                                    0 => 'Alternative medicine & therapies',
                                    1 => 'Chinese',
                                    2 => 'Herbalism',
                                    3 => 'Acupuncture',
                                    4 => 'Aromatherapy',
                                    5 => 'Hypnotherapy',
                                    6 => 'Reflexology',
                                ),
                            5 =>
                                array (
                                    0 => 'Hair & beauty science',
                                    1 => 'Hair services',
                                    2 => 'Beauty therapies',
                                    3 => 'Make-up',
                                ),
                            6 =>
                                array (
                                    0 => 'Spa & water-based therapies',
                                ),
                            9 =>
                                array (
                                    0 => 'Complementary medicines, therapies & well-being not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Nutrition',
                                ),
                            1 =>
                                array (
                                    0 => 'Dietetics',
                                ),
                            9 =>
                                array (
                                    0 => 'Nutrition not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Ophthalmics',
                                ),
                            1 =>
                                array (
                                    0 => 'Optometry',
                                ),
                            2 =>
                                array (
                                    0 => 'Orthoptics',
                                ),
                            9 =>
                                array (
                                    0 => 'Ophthalmics not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Aural & oral sciences',
                                ),
                            1 =>
                                array (
                                    0 => 'Audiology',
                                ),
                            2 =>
                                array (
                                    0 => 'Speech science',
                                ),
                            3 =>
                                array (
                                    0 => 'Language pathology',
                                ),
                            9 =>
                                array (
                                    0 => 'Aural & oral sciences not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Nursing',
                                    1 => 'Palliative care nursing',
                                    2 => 'Clinical practice nursing',
                                ),
                            1 =>
                                array (
                                    0 => 'Community nursing',
                                    1 => 'District Nursing',
                                    2 => 'Health visiting',
                                    3 => 'School nursing',
                                    4 => 'Practice nursing',
                                ),
                            2 =>
                                array (
                                    0 => 'Midwifery',
                                ),
                            3 =>
                                array (
                                    0 => 'Children\'s nursing',
                                    1 => 'Neonatal care',
                                ),
                            4 =>
                                array (
                                    0 => 'Adult nursing',
                                    1 => 'Older people nursing',
                                ),
                            5 =>
                                array (
                                    0 => 'Dental nursing',
                                ),
                            6 =>
                                array (
                                    0 => 'Mental health nursing',
                                    1 => 'Learning disability nursing',
                                ),
                            7 =>
                                array (
                                    0 => 'Medical nursing',
                                    1 => 'Critical care nursing',
                                    2 => 'Surgical nursing',
                                    3 => 'Emergency nursing',
                                ),
                            8 =>
                                array (
                                    0 => 'Paramedical Nursing',
                                ),
                            9 =>
                                array (
                                    0 => 'Nursing not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Medical technology',
                                ),
                            1 =>
                                array (
                                    0 => 'Cardiography',
                                ),
                            2 =>
                                array (
                                    0 => 'Radiology',
                                    1 => 'Radiography, diagnostic',
                                    2 => 'Radiography, therapeutic',
                                ),
                            3 =>
                                array (
                                    0 => 'Biomechanics & prosthetics (non-clinical)',
                                ),
                            4 =>
                                array (
                                    0 => 'Dental technology',
                                ),
                            5 =>
                                array (
                                    0 => 'Mortuary technology',
                                ),
                            9 =>
                                array (
                                    0 => 'Medical technology not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in subjects allied to medicine',
                                ),
                            1 =>
                                array (
                                    0 => 'Environmental health',
                                ),
                            2 =>
                                array (
                                    0 => 'Occupational health',
                                ),
                            3 =>
                                array (
                                    0 => 'Occupational therapy',
                                ),
                            4 =>
                                array (
                                    0 => 'Counselling',
                                ),
                            5 =>
                                array (
                                    0 => 'Paramedical science',
                                ),
                            6 =>
                                array (
                                    0 => 'Physician assistant studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Subjects allied to medicine not elsewhere classified',
                                ),
                        ),
                ),
            'C' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Biological Sciences',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Biology',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied biology',
                                    1 => 'Parasitology',
                                ),
                            2 =>
                                array (
                                    0 => 'Behavioural biology',
                                ),
                            3 =>
                                array (
                                    0 => 'Cell biology',
                                    1 => 'Applied cell biology',
                                ),
                            4 =>
                                array (
                                    0 => 'Developmental/Reproductive biology',
                                    1 => 'Developmental biology',
                                    2 => 'Reproductive biology',
                                ),
                            5 =>
                                array (
                                    0 => 'Environmental biology',
                                ),
                            6 =>
                                array (
                                    0 => 'Marine/Freshwater biology',
                                    1 => 'Marine biology',
                                    2 => 'Freshwater biology',
                                ),
                            7 =>
                                array (
                                    0 => 'Population biology',
                                ),
                            8 =>
                                array (
                                    0 => 'Ecology',
                                    1 => 'Biodiversity',
                                    2 => 'Evolution',
                                    3 => 'Community ecology',
                                    4 => 'Conservation ecology',
                                    5 => 'Ecosystem ecology & land use',
                                    6 => 'Population ecology',
                                    7 => 'Ecotoxicology',
                                ),
                            9 =>
                                array (
                                    0 => 'Biology not elsewhere classified',
                                    1 => 'Biometry',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Botany',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied botany',
                                ),
                            2 =>
                                array (
                                    0 => 'Mycology',
                                ),
                            3 =>
                                array (
                                    0 => 'Plant biotechnology',
                                ),
                            4 =>
                                array (
                                    0 => 'Plant cell science',
                                ),
                            5 =>
                                array (
                                    0 => 'Plant pathology',
                                ),
                            6 =>
                                array (
                                    0 => 'Plant physiology',
                                ),
                            7 =>
                                array (
                                    0 => 'Developmental & reproductive plant biology',
                                ),
                            8 =>
                                array (
                                    0 => 'Systematic botany',
                                ),
                            9 =>
                                array (
                                    0 => 'Botany not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Zoology',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied zoology',
                                ),
                            2 =>
                                array (
                                    0 => 'Cell zoology',
                                ),
                            3 =>
                                array (
                                    0 => 'Developmental & reproductive zoology',
                                ),
                            4 =>
                                array (
                                    0 => 'Entomology',
                                ),
                            5 =>
                                array (
                                    0 => 'Marine zoology',
                                ),
                            6 =>
                                array (
                                    0 => 'Pest science',
                                ),
                            8 =>
                                array (
                                    0 => 'Systematic zoology',
                                ),
                            9 =>
                                array (
                                    0 => 'Zoology not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Genetics',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied genetics',
                                ),
                            2 =>
                                array (
                                    0 => 'Human genetics',
                                ),
                            3 =>
                                array (
                                    0 => 'Medical & veterinary genetics',
                                    1 => 'Medical genetics',
                                    2 => 'Veterinary genetics',
                                ),
                            4 =>
                                array (
                                    0 => 'Molecular genetics',
                                    1 => 'Transcriptomics',
                                ),
                            5 =>
                                array (
                                    0 => 'Genomics',
                                    1 => 'Functional genomics',
                                    2 => 'Genome organisation',
                                ),
                            6 =>
                                array (
                                    0 => 'Genetic engineering',
                                ),
                            7 =>
                                array (
                                    0 => 'Population genetics & evolution',
                                ),
                            9 =>
                                array (
                                    0 => 'Genetics not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Microbiology',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied microbiology',
                                ),
                            2 =>
                                array (
                                    0 => 'Medical & veterinary microbiology',
                                    1 => 'Medical microbiology',
                                    2 => 'Veterinary microbiology',
                                ),
                            3 =>
                                array (
                                    0 => 'Bacteriology',
                                ),
                            4 =>
                                array (
                                    0 => 'Virology',
                                ),
                            5 =>
                                array (
                                    0 => 'Immunology',
                                ),
                            6 =>
                                array (
                                    0 => 'Biotechnology',
                                ),
                            7 =>
                                array (
                                    0 => 'Serology',
                                ),
                            9 =>
                                array (
                                    0 => 'Microbiology not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Sport & exercise science',
                                ),
                            1 =>
                                array (
                                    0 => 'Sport coaching',
                                ),
                            2 =>
                                array (
                                    0 => 'Sport development',
                                ),
                            3 =>
                                array (
                                    0 => 'Sport conditioning, rehabilitation & therapy',
                                ),
                            4 =>
                                array (
                                    0 => 'Sport studies',
                                ),
                            5 =>
                                array (
                                    0 => 'Sport technology',
                                ),
                            9 =>
                                array (
                                    0 => 'Sport & exercise science not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Molecular biology, biophysics & biochemistry',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied molecular biology, biophysics & biochemistry',
                                ),
                            2 =>
                                array (
                                    0 => 'Biological chemistry',
                                ),
                            3 =>
                                array (
                                    0 => 'Metabolic biochemistry',
                                ),
                            4 =>
                                array (
                                    0 => 'Medical & veterinary biochemistry',
                                    1 => 'Medical biochemistry',
                                    2 => 'Veterinary biochemistry',
                                ),
                            5 =>
                                array (
                                    0 => 'Plant biochemistry',
                                ),
                            6 =>
                                array (
                                    0 => 'Biomolecular science',
                                ),
                            7 =>
                                array (
                                    0 => 'Biophysical science',
                                ),
                            9 =>
                                array (
                                    0 => 'Molecular biology, biophysics & biochemistry not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Psychology',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied psychology',
                                    1 => 'Occupational psychology',
                                    2 => 'Educational psychology',
                                    3 => 'Sport psychology',
                                    4 => 'Organisational psychology',
                                    5 => 'Business psychology',
                                    6 => 'Forensic psychology',
                                ),
                            2 =>
                                array (
                                    0 => 'Developmental psychology',
                                    1 => 'Child psychology',
                                    2 => 'The psychology of ageing',
                                ),
                            3 =>
                                array (
                                    0 => 'Methodological & conceptual issues in psychology',
                                    1 => 'Research methods in psychology',
                                    2 => 'Quantitative psychology',
                                    3 => 'Qualitative psychology',
                                    4 => 'History of psychology',
                                    5 => 'Philosophy of psychology',
                                ),
                            4 =>
                                array (
                                    0 => 'Psychology in health & medicine',
                                    1 => 'Health psychology',
                                    2 => 'Clinical psychology',
                                    3 => 'Counselling psychology',
                                    5 => 'Clinical neuropsychology',
                                    6 => 'Community psychology',
                                    7 => 'Psychoanalytical studies',
                                    8 => 'Psychology of mental health',
                                ),
                            5 =>
                                array (
                                    0 => 'Cognitive & affective psychology',
                                    1 => 'Psychological modelling',
                                    2 => 'Psychology of communication',
                                    3 => 'Psychology of memory & learning',
                                    4 => 'Psychology of perception',
                                    5 => 'Psychology of higher cognitive processes',
                                    6 => 'Experimental psychology',
                                    7 => 'Affective psychology',
                                    8 => 'Transpersonal psychology',
                                ),
                            6 =>
                                array (
                                    0 => 'Psychobiology',
                                    1 => 'Cognitive neuroscience',
                                    2 => 'Affective neuroscience',
                                    3 => 'Psychopharmacology',
                                    4 => 'Evolutionary psychology',
                                    5 => 'Animal psychology',
                                ),
                            7 =>
                                array (
                                    0 => 'Personality & individual differences',
                                    1 => 'Psychometrics',
                                    2 => 'Psychology of gender',
                                    3 => 'Cross-cultural psychology',
                                ),
                            8 =>
                                array (
                                    0 => 'Social psychology',
                                    1 => 'Social cognition',
                                ),
                            9 =>
                                array (
                                    0 => 'Psychology not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in Biological Sciences',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied biological sciences',
                                ),
                            9 =>
                                array (
                                    0 => 'Biological sciences not elsewhere classified',
                                ),
                        ),
                ),
            'D' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Veterinary Sciences, Agriculture and related subjects',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Pre-clinical veterinary medicine',
                                ),
                            9 =>
                                array (
                                    0 => 'Pre-clinical veterinary medicine not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Clinical veterinary medicine & dentistry',
                                ),
                            1 =>
                                array (
                                    0 => 'Clinical veterinary medicine',
                                ),
                            2 =>
                                array (
                                    0 => 'Clinical veterinary dentistry',
                                ),
                            9 =>
                                array (
                                    0 => 'Clinical veterinary medicine & dentistry not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Animal science',
                                ),
                            1 =>
                                array (
                                    0 => 'Veterinary nursing',
                                ),
                            2 =>
                                array (
                                    0 => 'Animal health',
                                    1 => 'Animal anatomy',
                                    2 => 'Animal physiology',
                                    3 => 'Animal pathology',
                                    4 => 'Animal pharmacology',
                                    5 => 'Animal toxicology',
                                    6 => 'Animal pharmacy',
                                    7 => 'Animal nutrition',
                                    8 => 'Animal welfare',
                                ),
                            3 =>
                                array (
                                    0 => 'Veterinary public health',
                                ),
                            4 =>
                                array (
                                    0 => 'Overseas veterinary development',
                                ),
                            9 =>
                                array (
                                    0 => 'Animal sciences not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Agriculture',
                                ),
                            1 =>
                                array (
                                    0 => 'Arable & fruit farming',
                                    1 => 'Agricultural pests & diseases',
                                    2 => 'Crop physiology',
                                    3 => 'Crop nutrition',
                                    4 => 'Crop protection',
                                    5 => 'Crop production',
                                    6 => 'Glasshouse culture',
                                    7 => 'Amenity horticulture',
                                    8 => 'Exotic plants & crops',
                                ),
                            2 =>
                                array (
                                    0 => 'Livestock',
                                    1 => 'Livestock husbandry',
                                    2 => 'Equine studies',
                                    3 => 'Poultry keeping',
                                    4 => 'Game keeping',
                                    5 => 'Exotic livestock',
                                ),
                            3 =>
                                array (
                                    0 => 'Fish farming',
                                    1 => 'Fish husbandry',
                                    2 => 'Freshwater fish',
                                    3 => 'Saltwater fish',
                                    4 => 'Ornamental fish',
                                    5 => 'Aquaculture',
                                ),
                            4 =>
                                array (
                                    0 => 'Rural estate management',
                                    1 => 'Farm management',
                                    2 => 'Game keeping management',
                                    3 => 'Water resource management',
                                    4 => 'Land management for recreation',
                                    5 => 'Biological heritage site management',
                                    6 => 'Wilderness management',
                                    7 => 'Environmental conservation',
                                    8 => 'Sustainable agricultural & landscape development',
                                ),
                            5 =>
                                array (
                                    0 => 'International agriculture',
                                ),
                            6 =>
                                array (
                                    0 => 'Organic farming',
                                    1 => 'Organic arable & fruit farming',
                                    2 => 'Organic livestock',
                                    3 => 'Organic fish farming',
                                ),
                            7 =>
                                array (
                                    0 => 'Agricultural technology',
                                    1 => 'Agricultural machinery',
                                    2 => 'Agricultural irrigation & drainage',
                                ),
                            9 =>
                                array (
                                    0 => 'Agriculture not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Forestry & arboriculture',
                                ),
                            1 =>
                                array (
                                    0 => 'Trees & shrubs',
                                    1 => 'Forestry pests & diseases',
                                    2 => 'Tree physiology',
                                    3 => 'Tree nutrition',
                                    4 => 'Tree protection',
                                    5 => 'Tree production',
                                    6 => 'Timber production',
                                    7 => 'Community forestry',
                                ),
                            2 =>
                                array (
                                    0 => 'International forestry',
                                ),
                            3 =>
                                array (
                                    0 => 'Organic forestry',
                                ),
                            4 =>
                                array (
                                    0 => 'Forestry technology',
                                    1 => 'Forestry irrigation & drainage',
                                ),
                            9 =>
                                array (
                                    0 => 'Forestry not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Food & beverage studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Food science',
                                    1 => 'Meat science',
                                    2 => 'Cereal science',
                                    3 => 'Vegetable science',
                                    4 => 'Fruit science',
                                ),
                            2 =>
                                array (
                                    0 => 'Food hygiene',
                                ),
                            3 =>
                                array (
                                    0 => 'Food & beverage production',
                                    1 => 'Food & beverage manufacture',
                                    2 => 'Food & beverage processing',
                                    3 => 'Food & beverage technology',
                                    4 => 'Industrial baking',
                                    5 => 'Industrial brewing',
                                ),
                            4 =>
                                array (
                                    0 => 'Food & beverages for the consumer',
                                    1 => 'Food & beverage packaging',
                                    2 => 'Food & beverage delivery',
                                ),
                            9 =>
                                array (
                                    0 => 'Food & beverage studies not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Agricultural sciences',
                                ),
                            1 =>
                                array (
                                    0 => 'Agricultural biology',
                                    1 => 'Agricultural microbiology',
                                ),
                            2 =>
                                array (
                                    0 => 'Agricultural chemistry',
                                    1 => 'Agricultural biochemistry',
                                ),
                            3 =>
                                array (
                                    0 => 'Agricultural botany',
                                ),
                            4 =>
                                array (
                                    0 => 'Agricultural zoology',
                                ),
                            5 =>
                                array (
                                    0 => 'Soil as an agricultural medium',
                                ),
                            9 =>
                                array (
                                    0 => 'Agricultural sciences not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in veterinary sciences, agriculture & related subjects',
                                ),
                            9 =>
                                array (
                                    0 => 'Veterinary sciences, agriculture & related subjects not elsewhere classified',
                                ),
                        ),
                ),
            'F' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Physical Sciences',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Chemistry',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied chemistry',
                                    1 => 'Industrial chemistry',
                                    2 => 'Colour chemistry',
                                ),
                            2 =>
                                array (
                                    0 => 'Inorganic chemistry',
                                ),
                            3 =>
                                array (
                                    0 => 'Structural chemistry',
                                    1 => 'Crystallography',
                                ),
                            4 =>
                                array (
                                    0 => 'Environmental chemistry',
                                    1 => 'Marine chemistry',
                                ),
                            5 =>
                                array (
                                    0 => 'Medicinal chemistry',
                                    1 => 'Pharmaceutical chemistry',
                                ),
                            6 =>
                                array (
                                    0 => 'Organic chemistry',
                                    1 => 'Organometallic chemistry',
                                    2 => 'Polymer chemistry',
                                    3 => 'Bio-organic chemistry',
                                    4 => 'Petrochemical chemistry',
                                    5 => 'Biomolecular chemistry',
                                ),
                            7 =>
                                array (
                                    0 => 'Physical chemistry',
                                ),
                            8 =>
                                array (
                                    0 => 'Analytical chemistry',
                                ),
                            9 =>
                                array (
                                    0 => 'Chemistry not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Materials science',
                                ),
                            9 =>
                                array (
                                    0 => 'Materials science not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Physics',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied physics',
                                    1 => 'Engineering physics',
                                ),
                            2 =>
                                array (
                                    0 => 'Chemical physics',
                                    1 => 'Solid-state physics',
                                ),
                            3 =>
                                array (
                                    0 => 'Environmental physics',
                                    1 => 'Atmospheric physics',
                                    2 => 'Marine physics',
                                ),
                            4 =>
                                array (
                                    0 => 'Mathematical & theoretical physics',
                                    1 => 'Electromagnetism',
                                    2 => 'Quantum mechanics',
                                    3 => 'Computational physics',
                                ),
                            5 =>
                                array (
                                    0 => 'Medical physics',
                                    1 => 'Radiation physics',
                                ),
                            6 =>
                                array (
                                    0 => 'Optical physics',
                                    1 => 'Laser physics',
                                ),
                            7 =>
                                array (
                                    0 => 'Nuclear & particle physics',
                                ),
                            8 =>
                                array (
                                    0 => 'Acoustics',
                                ),
                            9 =>
                                array (
                                    0 => 'Physics not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Forensic & archaeological sciences',
                                ),
                            1 =>
                                array (
                                    0 => 'Forensic science',
                                ),
                            2 =>
                                array (
                                    0 => 'Archaeological science',
                                ),
                            9 =>
                                array (
                                    0 => 'Forensic & archaeological sciences not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Astronomy',
                                ),
                            1 =>
                                array (
                                    0 => 'Astrophysics',
                                ),
                            2 =>
                                array (
                                    0 => 'Space & planetary sciences',
                                    1 => 'Space science',
                                    2 => 'Planetary science',
                                ),
                            3 =>
                                array (
                                    0 => 'Solar & solar terrestrial physics',
                                ),
                            4 =>
                                array (
                                    0 => 'Astronomy observation',
                                ),
                            5 =>
                                array (
                                    0 => 'Astronomy theory',
                                ),
                            9 =>
                                array (
                                    0 => 'Astronomy not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Geology',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied geology',
                                    1 => 'Industrial geology',
                                    2 => 'Engineering geology',
                                ),
                            2 =>
                                array (
                                    0 => 'Mining geology',
                                    1 => 'Exploration geology',
                                ),
                            3 =>
                                array (
                                    0 => 'Geotechnology',
                                    1 => 'Marine geotechnology',
                                ),
                            4 =>
                                array (
                                    0 => 'Earth science',
                                    1 => 'Palaeontology',
                                    2 => 'Geoscience',
                                    3 => 'Quaternary studies',
                                    4 => 'Hydrogeology',
                                    5 => 'Mantle & core processes',
                                    6 => 'Land-atmosphere interactions',
                                ),
                            5 =>
                                array (
                                    0 => 'Geological oceanography',
                                ),
                            6 =>
                                array (
                                    0 => 'Geophysics',
                                    1 => 'Exploration geophysics',
                                ),
                            7 =>
                                array (
                                    0 => 'Geochemistry',
                                ),
                            8 =>
                                array (
                                    0 => 'Geohazards',
                                    1 => 'Seismology & tectonics',
                                    2 => 'Vulcanology',
                                ),
                            9 =>
                                array (
                                    0 => 'Geology not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Science of aquatic & terrestrial environments',
                                ),
                            1 =>
                                array (
                                    0 => 'Marine sciences',
                                ),
                            2 =>
                                array (
                                    0 => 'Hydrography',
                                ),
                            3 =>
                                array (
                                    0 => 'Ocean sciences',
                                    1 => 'Ocean circulation',
                                    2 => 'Oceanographic survey & monitoring',
                                    3 => 'Land-ocean interaction',
                                    4 => 'Atmosphere-ocean interactions',
                                ),
                            5 =>
                                array (
                                    0 => 'Environmental sciences',
                                    1 => 'Applied environmental sciences',
                                    2 => 'Hydrology',
                                    3 => 'Pollution control',
                                    4 => 'Biogeochemical cycles',
                                    5 => 'Environmental informatics',
                                    6 => 'Environmental physiology',
                                ),
                            6 =>
                                array (
                                    0 => 'Climatology',
                                    1 => 'Meteorology',
                                    2 => 'Large-scale atmospheric dynamics & transport',
                                    3 => 'Boundary-layer meteorology',
                                    4 => 'Climate & climate change',
                                    5 => 'Radiative processes & effects',
                                ),
                            7 =>
                                array (
                                    0 => 'Soil science',
                                ),
                            8 =>
                                array (
                                    0 => 'Glaciology & cryospheric systems',
                                ),
                            9 =>
                                array (
                                    0 => 'Science of aquatic & terrestrial environments not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Physical geographical sciences',
                                ),
                            1 =>
                                array (
                                    0 => 'Environmental geography',
                                    1 => 'Biogeography',
                                ),
                            2 =>
                                array (
                                    0 => 'Geomorphology',
                                ),
                            3 =>
                                array (
                                    0 => 'Topography',
                                    1 => 'Cartography',
                                    2 => 'Remote Sensing',
                                ),
                            4 =>
                                array (
                                    0 => 'Physical geography',
                                    1 => 'Maritime geography',
                                    2 => 'Geomorphology',
                                    3 => 'Topography',
                                    4 => 'Cartography',
                                    5 => 'Remote sensing',
                                    6 => 'Geographical information systems',
                                ),
                            5 =>
                                array (
                                    0 => 'Environmental Sciences',
                                    1 => 'Applied Environmental Sciences',
                                    2 => 'Hydrology',
                                    3 => 'Pollution Control',
                                ),
                            6 =>
                                array (
                                    0 => 'Climatology',
                                    1 => 'Meteorology',
                                ),
                            7 =>
                                array (
                                    0 => 'Soil Science',
                                ),
                            9 =>
                                array (
                                    0 => 'Physical geographical sciences not elsewhere classified',
                                    1 => 'Geographical Information Systems',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in physical sciences',
                                ),
                            9 =>
                                array (
                                    0 => 'Physical sciences not elsewhere classified',
                                ),
                        ),
                ),
            'G' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Mathematical Sciences',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Mathematics',
                                ),
                            1 =>
                                array (
                                    0 => 'Pure mathematics',
                                ),
                            2 =>
                                array (
                                    0 => 'Applied mathematics',
                                    1 => 'Mechanics (mathematical)',
                                ),
                            3 =>
                                array (
                                    0 => 'Mathematical methods',
                                ),
                            4 =>
                                array (
                                    0 => 'Numerical analysis',
                                ),
                            5 =>
                                array (
                                    0 => 'Mathematical modelling',
                                ),
                            6 =>
                                array (
                                    0 => 'Engineering/industrial mathematics',
                                ),
                            7 =>
                                array (
                                    0 => 'Computational mathematics',
                                ),
                            9 =>
                                array (
                                    0 => 'Mathematics not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Operational research',
                                ),
                            9 =>
                                array (
                                    0 => 'Operational research not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Statistics',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied statistics',
                                    1 => 'Medical statistics',
                                ),
                            2 =>
                                array (
                                    0 => 'Probability',
                                ),
                            3 =>
                                array (
                                    0 => 'Stochastic processes',
                                ),
                            4 =>
                                array (
                                    0 => 'Statistical modelling',
                                ),
                            5 =>
                                array (
                                    0 => 'Mathematical statistics',
                                ),
                            9 =>
                                array (
                                    0 => 'Statistics not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Computer Science',
                                ),
                            1 =>
                                array (
                                    0 => 'Computer Architectures & Operating Systems',
                                    1 => 'Computer Architectures',
                                    2 => 'Operating Systems',
                                ),
                            2 =>
                                array (
                                    0 => 'Networks and Communications',
                                ),
                            3 =>
                                array (
                                    0 => 'Computational Science Foundations',
                                ),
                            4 =>
                                array (
                                    0 => 'Human-computer Interaction',
                                ),
                            5 =>
                                array (
                                    0 => 'Multi-media Computing Science',
                                ),
                            9 =>
                                array (
                                    0 => 'Computing Science not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Information Systems',
                                ),
                            1 =>
                                array (
                                    0 => 'Information Modelling',
                                ),
                            2 =>
                                array (
                                    0 => 'Systems Design Methodologies',
                                ),
                            3 =>
                                array (
                                    0 => 'Systems Analysis and Design',
                                ),
                            4 =>
                                array (
                                    0 => 'Databases',
                                ),
                            5 =>
                                array (
                                    0 => 'Systems Auditing',
                                ),
                            6 =>
                                array (
                                    0 => 'Data Management',
                                ),
                            9 =>
                                array (
                                    0 => 'Systems Analysis and Design not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Software Engineering',
                                ),
                            1 =>
                                array (
                                    0 => 'Software Design',
                                ),
                            2 =>
                                array (
                                    0 => 'Programming',
                                    1 => 'Procedural Programming',
                                    2 => 'Object Oriented Programming',
                                    3 => 'Declarative Programming',
                                ),
                            9 =>
                                array (
                                    0 => 'Software Engineering not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Artificial Intelligence',
                                ),
                            1 =>
                                array (
                                    0 => 'Speech and Natural Language Processing',
                                ),
                            2 =>
                                array (
                                    0 => 'Knowledge Representation',
                                ),
                            3 =>
                                array (
                                    0 => 'Neural Computing',
                                ),
                            4 =>
                                array (
                                    0 => 'Computer Vision',
                                ),
                            5 =>
                                array (
                                    0 => 'Cognitive Modelling',
                                ),
                            6 =>
                                array (
                                    0 => 'Machine Learning',
                                    1 => 'Automated Reasoning',
                                ),
                            9 =>
                                array (
                                    0 => 'Artificial Intelligence not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in mathematical sciences',
                                ),
                            1 =>
                                array (
                                    0 => 'Others in Mathematical Sciences',
                                ),
                            2 =>
                                array (
                                    0 => 'Others in Computing Sciences',
                                ),
                            9 =>
                                array (
                                    0 => 'Mathematical and Computing Sciences not elsewhere classified',
                                ),
                        ),
                ),
            'H' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Engineering',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'General engineering',
                                ),
                            1 =>
                                array (
                                    0 => 'Integrated engineering',
                                ),
                            2 =>
                                array (
                                    0 => 'Safety engineering',
                                    1 => 'Fire safety engineering',
                                    2 => 'Water quality control',
                                    3 => 'Public health engineering',
                                ),
                            3 =>
                                array (
                                    0 => 'Computer-aided engineering',
                                    1 => 'Automated engineering design',
                                ),
                            4 =>
                                array (
                                    0 => 'Mechanics',
                                    1 => 'Fluid mechanics',
                                    2 => 'Solid mechanics',
                                    3 => 'Structural mechanics',
                                ),
                            5 =>
                                array (
                                    0 => 'Engineering design',
                                ),
                            6 =>
                                array (
                                    0 => 'Bioengineering, biomedical engineering & clinical engineering',
                                    1 => 'Biomaterials',
                                    2 => 'Biomechanics (including fluid & solid mechanics)',
                                    3 => 'Bioelectronics & bioelectricity',
                                    4 => 'Rehabilitation engineering',
                                    5 => 'Tissue engineering & regenerative medicine',
                                    6 => 'Imaging',
                                    7 => 'Biosensors',
                                    8 => 'Medical devices & instrumentation',
                                    9 => 'Neural engineering',
                                ),
                            9 =>
                                array (
                                    0 => 'General engineering not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Civil engineering',
                                ),
                            1 =>
                                array (
                                    0 => 'Structural engineering',
                                ),
                            2 =>
                                array (
                                    0 => 'Environmental engineering',
                                    1 => 'Energy resources',
                                    2 => 'Coastal decay',
                                    3 => 'Environmental impact assessment',
                                ),
                            3 =>
                                array (
                                    0 => 'Transport engineering',
                                    1 => 'Permanent way engineering',
                                    2 => 'Pavement engineering',
                                ),
                            4 =>
                                array (
                                    0 => 'Surveying science',
                                    1 => 'General practice surveying',
                                    2 => 'Engineering surveying',
                                ),
                            5 =>
                                array (
                                    0 => 'Geotechnical engineering',
                                ),
                            9 =>
                                array (
                                    0 => 'Civil engineering not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Mechanical engineering',
                                ),
                            1 =>
                                array (
                                    0 => 'Dynamics',
                                    1 => 'Thermodynamics',
                                ),
                            2 =>
                                array (
                                    0 => 'Mechanisms & machines',
                                    1 => 'Turbine technology',
                                ),
                            3 =>
                                array (
                                    0 => 'Automotive engineering',
                                    1 => 'Road vehicle engineering',
                                    2 => 'Rail vehicle engineering',
                                    3 => 'Ship propulsion engineering',
                                ),
                            4 =>
                                array (
                                    0 => 'Acoustics & vibration',
                                    1 => 'Acoustics',
                                    2 => 'Vibration',
                                ),
                            5 =>
                                array (
                                    0 => 'Offshore engineering',
                                ),
                            6 =>
                                array (
                                    0 => 'Electromechanical engineering',
                                ),
                            9 =>
                                array (
                                    0 => 'Mechanical engineering not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Aerospace engineering',
                                ),
                            1 =>
                                array (
                                    0 => 'Aeronautical engineering',
                                    1 => 'Air passenger transport engineering',
                                    2 => 'Air freight transport engineering',
                                    3 => 'Air combat engineering',
                                ),
                            2 =>
                                array (
                                    0 => 'Astronautical engineering',
                                ),
                            3 =>
                                array (
                                    0 => 'Avionics',
                                ),
                            4 =>
                                array (
                                    0 => 'Aerodynamics',
                                    1 => 'Flight mechanics',
                                ),
                            5 =>
                                array (
                                    0 => 'Propulsion systems',
                                ),
                            6 =>
                                array (
                                    0 => 'Aviation studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Aerospace engineering not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Naval architecture',
                                ),
                            1 =>
                                array (
                                    0 => 'Shipbuilding',
                                    1 => 'Surface passenger ship building',
                                    2 => 'Surface freight ship building',
                                    3 => 'Surface combat ship building',
                                    4 => 'Submarine building',
                                ),
                            2 =>
                                array (
                                    0 => 'Ship design',
                                    1 => 'Surface passenger ship design',
                                    2 => 'Surface freight ship design',
                                    3 => 'Surface combat ship design',
                                    4 => 'Submarine design',
                                ),
                            9 =>
                                array (
                                    0 => 'Naval architecture not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Electronic & electrical engineering',
                                ),
                            1 =>
                                array (
                                    0 => 'Electronic engineering',
                                    1 => 'Microelectronic engineering',
                                    2 => 'Integrated circuit design',
                                ),
                            2 =>
                                array (
                                    0 => 'Electrical engineering',
                                ),
                            3 =>
                                array (
                                    0 => 'Electrical power',
                                    1 => 'Electrical power generation',
                                    2 => 'Electrical power distribution',
                                ),
                            4 =>
                                array (
                                    0 => 'Communications engineering',
                                    1 => 'Telecommunications engineering',
                                    2 => 'Broadcast engineering',
                                    3 => 'Satellite engineering',
                                    4 => 'Microwave engineering',
                                ),
                            5 =>
                                array (
                                    0 => 'Systems engineering',
                                    1 => 'Digital circuit engineering',
                                    2 => 'Analogue circuit engineering',
                                ),
                            6 =>
                                array (
                                    0 => 'Control systems',
                                    1 => 'Instrumentation control',
                                    2 => 'Control by light systems',
                                ),
                            7 =>
                                array (
                                    0 => 'Robotics & cybernetics',
                                    1 => 'Robotics',
                                    2 => 'Cybernetics',
                                    3 => 'Bioengineering',
                                    4 => 'Virtual reality engineering',
                                ),
                            8 =>
                                array (
                                    0 => 'Optoelectronic engineering',
                                ),
                            9 =>
                                array (
                                    0 => 'Electronic & electrical engineering not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Production & manufacturing engineering',
                                ),
                            1 =>
                                array (
                                    0 => 'Manufacturing systems engineering',
                                    1 => 'Manufacturing systems design',
                                    2 => 'Manufacturing installation systems',
                                    3 => 'Production processes',
                                    4 => 'Manufacturing systems maintenance',
                                ),
                            2 =>
                                array (
                                    0 => 'Quality assurance engineering',
                                ),
                            3 =>
                                array (
                                    0 => 'Mechatronics',
                                ),
                            9 =>
                                array (
                                    0 => 'Production & manufacturing engineering not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Chemical, process & energy engineering',
                                ),
                            1 =>
                                array (
                                    0 => 'Chemical engineering',
                                    1 => 'Biochemical engineering',
                                    2 => 'Pharmaceutical engineering',
                                ),
                            2 =>
                                array (
                                    0 => 'Atomic engineering',
                                    1 => 'Nuclear engineering',
                                ),
                            3 =>
                                array (
                                    0 => 'Chemical process engineering',
                                    1 => 'Bioprocess engineering',
                                ),
                            4 =>
                                array (
                                    0 => 'Gas engineering',
                                ),
                            5 =>
                                array (
                                    0 => 'Petroleum engineering',
                                ),
                            9 =>
                                array (
                                    0 => 'Chemical, process & energy engineering not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in engineering',
                                ),
                            9 =>
                                array (
                                    0 => 'Engineering not elsewhere classified',
                                ),
                        ),
                ),
            'I' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Computer Sciences',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Computer science',
                                ),
                            1 =>
                                array (
                                    0 => 'Computer architectures & operating systems',
                                    1 => 'Computer architectures',
                                    2 => 'Operating systems',
                                    3 => 'Displays & imaging',
                                    4 => 'High end computing',
                                    5 => 'Parallel computing',
                                ),
                            2 =>
                                array (
                                    0 => 'Networks & communications',
                                ),
                            3 =>
                                array (
                                    0 => 'Computational science foundations',
                                ),
                            4 =>
                                array (
                                    0 => 'Human-computer interaction',
                                ),
                            5 =>
                                array (
                                    0 => 'Multimedia computing science',
                                ),
                            6 =>
                                array (
                                    0 => 'Internet',
                                    1 => 'e-business',
                                ),
                            9 =>
                                array (
                                    0 => 'Computer science not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Information systems',
                                ),
                            1 =>
                                array (
                                    0 => 'Information modelling',
                                ),
                            2 =>
                                array (
                                    0 => 'Systems design methodologies',
                                ),
                            3 =>
                                array (
                                    0 => 'Systems analysis & design',
                                ),
                            4 =>
                                array (
                                    0 => 'Databases',
                                ),
                            5 =>
                                array (
                                    0 => 'Systems auditing',
                                ),
                            6 =>
                                array (
                                    0 => 'Data management',
                                ),
                            7 =>
                                array (
                                    0 => 'Intelligent & expert systems',
                                ),
                            9 =>
                                array (
                                    0 => 'Systems analysis & design not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Software engineering',
                                ),
                            1 =>
                                array (
                                    0 => 'Software design',
                                ),
                            2 =>
                                array (
                                    0 => 'Programming',
                                    1 => 'Procedural programming',
                                    2 => 'Object-oriented programming',
                                    3 => 'Declarative programming',
                                ),
                            9 =>
                                array (
                                    0 => 'Software engineering not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Artificial intelligence',
                                ),
                            1 =>
                                array (
                                    0 => 'Speech & natural language processing',
                                ),
                            2 =>
                                array (
                                    0 => 'Knowledge representation',
                                ),
                            3 =>
                                array (
                                    0 => 'Neural computing',
                                ),
                            4 =>
                                array (
                                    0 => 'Computer vision',
                                ),
                            5 =>
                                array (
                                    0 => 'Cognitive modelling',
                                ),
                            6 =>
                                array (
                                    0 => 'Machine learning',
                                    1 => 'Automated reasoning',
                                ),
                            9 =>
                                array (
                                    0 => 'Artificial intelligence not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Health informatics',
                                ),
                            1 =>
                                array (
                                    0 => 'Health technologies',
                                ),
                            2 =>
                                array (
                                    0 => 'Bioinformatics',
                                ),
                            3 =>
                                array (
                                    0 => 'Tele healthcare',
                                ),
                            9 =>
                                array (
                                    0 => 'Health informatics not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Games',
                                ),
                            1 =>
                                array (
                                    0 => 'Computer games programming',
                                ),
                            2 =>
                                array (
                                    0 => 'Computer games design',
                                ),
                            3 =>
                                array (
                                    0 => 'Computer games graphics',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Computer generated visual & audio effects',
                                ),
                            1 =>
                                array (
                                    0 => 'Computer generated imagery',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in Computer sciences',
                                ),
                            9 =>
                                array (
                                    0 => 'Computer sciences not elsewhere classified',
                                ),
                        ),
                ),
            'J' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Technologies',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Minerals technology',
                                ),
                            1 =>
                                array (
                                    0 => 'Mining',
                                ),
                            2 =>
                                array (
                                    0 => 'Quarrying',
                                ),
                            3 =>
                                array (
                                    0 => 'Rock mechanics',
                                ),
                            4 =>
                                array (
                                    0 => 'Minerals processing',
                                ),
                            5 =>
                                array (
                                    0 => 'Minerals surveying',
                                ),
                            6 =>
                                array (
                                    0 => 'Petrochemical technology',
                                ),
                            9 =>
                                array (
                                    0 => 'Minerals technology not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Metallurgy',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied metallurgy',
                                ),
                            2 =>
                                array (
                                    0 => 'Metallic fabrication',
                                    1 => 'Pattern making',
                                ),
                            3 =>
                                array (
                                    0 => 'Corrosion technology',
                                ),
                            9 =>
                                array (
                                    0 => 'Metallurgy not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Ceramics & glass',
                                ),
                            1 =>
                                array (
                                    0 => 'Ceramics',
                                ),
                            2 =>
                                array (
                                    0 => 'Glass technology',
                                ),
                            9 =>
                                array (
                                    0 => 'Ceramics & glass not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Polymers & textiles',
                                ),
                            1 =>
                                array (
                                    0 => 'Polymers technology',
                                    1 => 'Plastics',
                                ),
                            2 =>
                                array (
                                    0 => 'Textiles technology',
                                    1 => 'Textile chemistry',
                                    2 => 'Dying & colouring of textiles',
                                ),
                            3 =>
                                array (
                                    0 => 'Leather technology',
                                    1 => 'Tanning',
                                ),
                            4 =>
                                array (
                                    0 => 'Clothing production',
                                    1 => 'Machine knitting',
                                    2 => 'Commercial tailoring',
                                    3 => 'Pattern cutting',
                                    4 => 'Millinery',
                                    5 => 'Footwear production',
                                ),
                            9 =>
                                array (
                                    0 => 'Polymers & textiles not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Materials technology not otherwise specified',
                                ),
                            1 =>
                                array (
                                    0 => 'Materials technology',
                                    1 => 'Engineering materials',
                                    2 => 'Paper technology',
                                    3 => 'Furniture technology',
                                ),
                            2 =>
                                array (
                                    0 => 'Printing',
                                    1 => 'Offset lithography',
                                    2 => 'Photo-lithography',
                                    3 => 'Reprographic techniques',
                                    4 => 'Screen process printing',
                                ),
                            3 =>
                                array (
                                    0 => 'Gemmology',
                                ),
                            9 =>
                                array (
                                    0 => 'Materials technology not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Maritime technology',
                                ),
                            1 =>
                                array (
                                    0 => 'Marine technology',
                                    1 => 'Marine navigation',
                                    2 => 'Marine radar',
                                    3 => 'Marine radio',
                                    4 => 'Marine plumbing',
                                ),
                            9 =>
                                array (
                                    0 => 'Maritime technology not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Biotechnology',
                                ),
                            1 =>
                                array (
                                    0 => 'Plant biotechnology (crops, trees, shrubs etc.)',
                                ),
                            2 =>
                                array (
                                    0 => 'Animal biotechnology',
                                ),
                            3 =>
                                array (
                                    0 => 'Environmental biotechnology',
                                ),
                            4 =>
                                array (
                                    0 => 'Industrial biotechnology',
                                ),
                            5 =>
                                array (
                                    0 => 'Medical biotechnology',
                                ),
                            9 =>
                                array (
                                    0 => 'Biotechnology not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in technology',
                                ),
                            1 =>
                                array (
                                    0 => 'Energy technologies',
                                ),
                            2 =>
                                array (
                                    0 => 'Ergonomics',
                                ),
                            3 =>
                                array (
                                    0 => 'Audio technology',
                                    1 => 'Music recording',
                                ),
                            4 =>
                                array (
                                    0 => 'Machinery maintenance',
                                    1 => 'Office machinery maintenance',
                                    2 => 'Industrial machinery maintenance',
                                ),
                            5 =>
                                array (
                                    0 => 'Musical instrument technology',
                                ),
                            6 =>
                                array (
                                    0 => 'Transport logistics',
                                ),
                            7 =>
                                array (
                                    0 => 'Emergency & disaster technologies',
                                ),
                            9 =>
                                array (
                                    0 => 'Technologies not elsewhere classified',
                                ),
                        ),
                ),
            'K' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Architecture, building and planning',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Architecture',
                                ),
                            1 =>
                                array (
                                    0 => 'Architectural design theory',
                                ),
                            2 =>
                                array (
                                    0 => 'Interior architecture',
                                ),
                            3 =>
                                array (
                                    0 => 'Architectural technology',
                                ),
                            9 =>
                                array (
                                    0 => 'Architecture not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Building',
                                ),
                            1 =>
                                array (
                                    0 => 'Building technology',
                                ),
                            2 =>
                                array (
                                    0 => 'Construction management',
                                ),
                            3 =>
                                array (
                                    0 => 'Building surveying',
                                ),
                            4 =>
                                array (
                                    0 => 'Quantity surveying',
                                ),
                            5 =>
                                array (
                                    0 => 'Conservation of buildings',
                                    1 => 'Property development',
                                ),
                            9 =>
                                array (
                                    0 => 'Building not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Landscape & garden design',
                                ),
                            1 =>
                                array (
                                    0 => 'Landscape architecture',
                                ),
                            2 =>
                                array (
                                    0 => 'Landscape studies',
                                ),
                            3 =>
                                array (
                                    0 => 'Landscape design',
                                ),
                            4 =>
                                array (
                                    0 => 'Garden design',
                                    1 => 'Garden horticulture',
                                ),
                            9 =>
                                array (
                                    0 => 'Landscape & garden design not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Planning (urban, rural & regional)',
                                ),
                            1 =>
                                array (
                                    0 => 'Regional planning',
                                ),
                            2 =>
                                array (
                                    0 => 'Urban & rural planning',
                                    1 => 'Urban planning',
                                    2 => 'Rural planning',
                                ),
                            3 =>
                                array (
                                    0 => 'Planning studies',
                                ),
                            4 =>
                                array (
                                    0 => 'Urban studies',
                                ),
                            5 =>
                                array (
                                    0 => 'Housing',
                                ),
                            6 =>
                                array (
                                    0 => 'Transport planning',
                                ),
                            9 =>
                                array (
                                    0 => 'Planning (urban, rural & regional) not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in architecture, building & planning',
                                ),
                            9 =>
                                array (
                                    0 => 'Architecture, building & planning not elsewhere classified',
                                ),
                        ),
                ),
            'L' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Social studies',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Economics',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied economics',
                                    1 => 'Financial economics',
                                    2 => 'Agricultural economics',
                                    3 => 'Economic policy',
                                ),
                            2 =>
                                array (
                                    0 => 'Microeconomics',
                                ),
                            3 =>
                                array (
                                    0 => 'Macroeconomics',
                                ),
                            4 =>
                                array (
                                    0 => 'Econometrics',
                                ),
                            5 =>
                                array (
                                    0 => 'Political economics',
                                ),
                            6 =>
                                array (
                                    0 => 'International economics',
                                ),
                            7 =>
                                array (
                                    0 => 'Economic systems',
                                    1 => 'Capitalism',
                                    2 => 'Monetarism',
                                    3 => 'Keynesianism',
                                    4 => 'Collectivism',
                                ),
                            9 =>
                                array (
                                    0 => 'Economics not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Politics',
                                ),
                            1 =>
                                array (
                                    0 => 'Political theories',
                                    1 => 'Liberalism',
                                    2 => 'Conservatism',
                                    3 => 'Socialism',
                                    4 => 'Nationalism',
                                    5 => 'Fascism',
                                    6 => 'Feminism',
                                    7 => 'Environmentalism',
                                    8 => 'Anarchism',
                                ),
                            2 =>
                                array (
                                    0 => 'Political systems',
                                    1 => 'Autocracy',
                                    2 => 'Democracy',
                                    3 => 'Plutocracy',
                                    4 => 'Oligarchy',
                                ),
                            3 =>
                                array (
                                    0 => 'UK government/parliamentary studies',
                                    1 => 'Public administration',
                                    2 => 'UK constitutional studies',
                                ),
                            4 =>
                                array (
                                    0 => 'International politics',
                                    1 => 'European Union politics',
                                    2 => 'Commonwealth politics',
                                    3 => 'Politics of a specific country/region',
                                    4 => 'International constitutional studies',
                                ),
                            5 =>
                                array (
                                    0 => 'International relations',
                                    1 => 'Strategic studies',
                                    2 => 'War & peace studies',
                                    3 => 'International criminology',
                                ),
                            6 =>
                                array (
                                    0 => 'Comparative politics',
                                ),
                            9 =>
                                array (
                                    0 => 'Politics not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Sociology',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied sociology',
                                    1 => 'Applied criminology',
                                    2 => 'Victimology',
                                ),
                            2 =>
                                array (
                                    0 => 'Gender studies',
                                    1 => 'Women\'s studies',
                                    2 => 'Men\'s studies',
                                ),
                            3 =>
                                array (
                                    0 => 'Ethnic studies',
                                ),
                            4 =>
                                array (
                                    0 => 'Disability in society',
                                ),
                            5 =>
                                array (
                                    0 => 'Religion in society',
                                ),
                            6 =>
                                array (
                                    0 => 'Socio-economics',
                                ),
                            7 =>
                                array (
                                    0 => 'Social theory',
                                    1 => 'Social hierarchy',
                                ),
                            8 =>
                                array (
                                    0 => 'Political sociology',
                                ),
                            9 =>
                                array (
                                    0 => 'Sociology not elsewhere classified',
                                    1 => 'Sociology of science & technology',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Social policy',
                                ),
                            1 =>
                                array (
                                    0 => 'UK social policy',
                                ),
                            2 =>
                                array (
                                    0 => 'International social policy',
                                ),
                            3 =>
                                array (
                                    0 => 'Public policy',
                                    1 => 'Health policy',
                                    2 => 'Welfare policy',
                                    3 => 'Education policy',
                                    4 => 'Transport policy',
                                    5 => 'Security policy',
                                    6 => 'Emergency services policy',
                                    7 => 'Criminal justice policy',
                                ),
                            9 =>
                                array (
                                    0 => 'Social policy not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Social work',
                                ),
                            1 =>
                                array (
                                    0 => 'Health & welfare',
                                ),
                            2 =>
                                array (
                                    0 => 'Child care',
                                ),
                            3 =>
                                array (
                                    0 => 'Youth work',
                                ),
                            4 =>
                                array (
                                    0 => 'Community work',
                                    1 => 'Community justice',
                                ),
                            5 =>
                                array (
                                    0 => 'Careers guidance',
                                ),
                            6 =>
                                array (
                                    0 => 'Probation/after-care',
                                ),
                            9 =>
                                array (
                                    0 => 'Social work not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Anthropology',
                                ),
                            1 =>
                                array (
                                    0 => 'Social & cultural anthropology',
                                    1 => 'Criminological theory',
                                ),
                            2 =>
                                array (
                                    0 => 'Physical & biological anthropology',
                                ),
                            9 =>
                                array (
                                    0 => 'Anthropology not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Human & social geography',
                                ),
                            1 =>
                                array (
                                    0 => 'Human & social geography by area',
                                    1 => 'Human & social geography of Europe',
                                    2 => 'Human & social geography of Asia',
                                    3 => 'Human & social geography of Africa',
                                    4 => 'Human & social geography of Australasia',
                                    5 => 'Human & social geography of the Americas',
                                    6 => 'Human & social geography of the Arctic/Antarctic',
                                ),
                            2 =>
                                array (
                                    0 => 'Human & social geography by topic',
                                    1 => 'Economic geography',
                                    2 => 'Urban geography',
                                    3 => 'Political geography',
                                    4 => 'Transport geography',
                                    5 => 'Historical geography',
                                    6 => 'Cultural geography',
                                    7 => 'Agricultural geography',
                                    8 => 'Human Demography',
                                ),
                            9 =>
                                array (
                                    0 => 'Human & social geography not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Development studies',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in social studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Social studies not elsewhere classified',
                                ),
                        ),
                ),
            'M' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Law',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Law by area',
                                ),
                            1 =>
                                array (
                                    0 => 'UK legal systems',
                                    1 => 'English law',
                                    2 => 'Welsh law',
                                    3 => 'Northern Irish law',
                                    4 => 'Scottish law',
                                ),
                            2 =>
                                array (
                                    0 => 'European Union law',
                                ),
                            3 =>
                                array (
                                    0 => 'Public international law',
                                ),
                            4 =>
                                array (
                                    0 => 'Comparative law',
                                ),
                            9 =>
                                array (
                                    0 => 'Law by area not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Law by topic',
                                ),
                            1 =>
                                array (
                                    0 => 'Public law',
                                    1 => 'Criminal law',
                                ),
                            2 =>
                                array (
                                    0 => 'Private law',
                                    1 => 'Business & commercial law',
                                    2 => 'Contract law',
                                    3 => 'Property law',
                                    4 => 'Torts',
                                ),
                            4 =>
                                array (
                                    0 => 'Jurisprudence',
                                ),
                            5 =>
                                array (
                                    0 => 'Legal practice',
                                ),
                            6 =>
                                array (
                                    0 => 'Medical law',
                                ),
                            7 =>
                                array (
                                    0 => 'Sociology of law',
                                ),
                            9 =>
                                array (
                                    0 => 'Law by topic not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in law',
                                ),
                            9 =>
                                array (
                                    0 => 'Law not elsewhere classified',
                                ),
                        ),
                ),
            'N' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Business and administrative studies',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Business studies',
                                ),
                            1 =>
                                array (
                                    0 => 'European business studies',
                                ),
                            2 =>
                                array (
                                    0 => 'International business studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Business studies not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Management studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Management techniques',
                                    1 => 'Strategic management',
                                    2 => 'Creative management',
                                    3 => 'Project management',
                                    4 => 'Change management',
                                    5 => 'Organisational development',
                                ),
                            2 =>
                                array (
                                    0 => 'Institutional management',
                                    1 => 'Hotel and Catering',
                                    2 => 'Recreation/Leisure Management',
                                    3 => 'Domestic management',
                                    4 => 'Management & organisation of education',
                                    5 => 'Criminal justice management',
                                ),
                            3 =>
                                array (
                                    0 => 'Land & property management',
                                    1 => 'Land management',
                                    2 => 'Property management',
                                    4 => 'Property valuation & auctioneering',
                                ),
                            4 =>
                                array (
                                    0 => 'Retail management',
                                ),
                            5 =>
                                array (
                                    0 => 'Emergency & disaster management',
                                    1 => 'Emergency services management',
                                    2 => 'Disaster management',
                                ),
                            9 =>
                                array (
                                    0 => 'Management studies not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Finance',
                                ),
                            1 =>
                                array (
                                    0 => 'Banking',
                                ),
                            2 =>
                                array (
                                    0 => 'Investment & insurance',
                                    1 => 'Investment',
                                    2 => 'Insurance',
                                    3 => 'Actuarial science',
                                ),
                            3 =>
                                array (
                                    0 => 'Taxation',
                                ),
                            4 =>
                                array (
                                    0 => 'Financial management',
                                    1 => 'Financial risk',
                                ),
                            9 =>
                                array (
                                    0 => 'Finance not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Accounting',
                                ),
                            1 =>
                                array (
                                    0 => 'Accountancy',
                                    1 => 'Cost & management accountancy',
                                    2 => 'Public accountancy',
                                    3 => 'Book keeping',
                                ),
                            2 =>
                                array (
                                    0 => 'Accounting theory',
                                    1 => 'Auditing of accounts',
                                    2 => 'Financial reporting',
                                ),
                            9 =>
                                array (
                                    0 => 'Accounting not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Marketing',
                                ),
                            1 =>
                                array (
                                    0 => 'Market research',
                                ),
                            2 =>
                                array (
                                    0 => 'Sales management',
                                ),
                            3 =>
                                array (
                                    0 => 'Distribution',
                                ),
                            5 =>
                                array (
                                    0 => 'International marketing',
                                ),
                            6 =>
                                array (
                                    0 => 'Promotion & advertising',
                                    1 => 'Advertising',
                                    2 => 'Corporate image',
                                    3 => 'Sponsorship',
                                ),
                            9 =>
                                array (
                                    0 => 'Marketing not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Human resource management',
                                ),
                            1 =>
                                array (
                                    1 => 'Industrial relations',
                                    2 => 'Staff development',
                                    3 => 'Training methods',
                                    4 => 'Recruitment methods',
                                ),
                            2 =>
                                array (
                                    0 => 'Health & safety issues',
                                ),
                            9 =>
                                array (
                                    0 => 'Human resources management not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Office skills',
                                ),
                            1 =>
                                array (
                                    0 => 'Office administration',
                                ),
                            2 =>
                                array (
                                    0 => 'Secretarial & typing skills',
                                    1 => 'Audio typing',
                                    2 => 'Shorthand & shorthand transcription',
                                ),
                            9 =>
                                array (
                                    0 => 'Office skills not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Hospitality, leisure, sport, tourism & transport',
                                ),
                            1 =>
                                array (
                                    0 => 'Travel management',
                                ),
                            2 =>
                                array (
                                    0 => 'Event management',
                                ),
                            3 =>
                                array (
                                    0 => 'Tourism',
                                    1 => 'Tourism studies',
                                    2 => 'Tourism management',
                                ),
                            4 =>
                                array (
                                    0 => 'International Tourism',
                                ),
                            5 =>
                                array (
                                    0 => 'Transport studies',
                                    1 => 'Land travel',
                                    2 => 'Sea travel',
                                    3 => 'Air travel',
                                ),
                            6 =>
                                array (
                                    0 => 'Hospitality',
                                    1 => 'Hospitality studies',
                                    2 => 'Hospitality management',
                                ),
                            7 =>
                                array (
                                    0 => 'Recreation & leisure studies',
                                    1 => 'Spa management',
                                    2 => 'Salon management',
                                ),
                            8 =>
                                array (
                                    0 => 'Sport management',
                                ),
                            9 =>
                                array (
                                    0 => 'Hospitality, leisure, sport, tourism & transport not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in business & administrative studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Business & administrative studies not elsewhere classified',
                                ),
                        ),
                ),
            'P' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Mass communication and documentation',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Information services',
                                ),
                            1 =>
                                array (
                                    0 => 'Information management',
                                ),
                            2 =>
                                array (
                                    0 => 'Librarianship',
                                    1 => 'Library studies',
                                ),
                            3 =>
                                array (
                                    0 => 'Curatorial studies',
                                    1 => 'Museum studies',
                                    2 => 'Archive studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Information services not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Publicity studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Public relations',
                                ),
                            9 =>
                                array (
                                    0 => 'Publicity studies not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Media studies',
                                    1 => 'Television studies',
                                    2 => 'Radio studies',
                                    3 => 'Film studies',
                                    4 => 'Electronic media studies',
                                    5 => 'Paper-based media studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Media production',
                                    1 => 'Television production',
                                    2 => 'Radio production',
                                    3 => 'Film production',
                                ),
                            9 =>
                                array (
                                    0 => 'Media studies not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Publishing',
                                ),
                            1 =>
                                array (
                                    0 => 'Electronic publishing',
                                    1 => 'Publishing on audio/video tape',
                                    2 => 'Publishing on CD-ROM',
                                    3 => 'Publishing via the World Wide Web',
                                ),
                            2 =>
                                array (
                                    0 => 'Multimedia publishing',
                                ),
                            3 =>
                                array (
                                    0 => 'Interactive publishing',
                                ),
                            9 =>
                                array (
                                    0 => 'Publishing not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Journalism',
                                ),
                            1 =>
                                array (
                                    0 => 'Factual reporting',
                                ),
                            9 =>
                                array (
                                    0 => 'Journalism not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in mass communications & documentation',
                                ),
                            9 =>
                                array (
                                    0 => 'Mass communications & documentation not elsewhere classified',
                                ),
                        ),
                ),
            'Q' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Linguistics, classics and related subjects',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Linguistics',
                                ),
                            1 =>
                                array (
                                    0 => 'Applied linguistics',
                                ),
                            2 =>
                                array (
                                    0 => 'Historical linguistics',
                                ),
                            3 =>
                                array (
                                    0 => 'Phonetics & phonology',
                                    1 => 'Phonetics',
                                    2 => 'Phonology',
                                ),
                            4 =>
                                array (
                                    0 => 'Sociolinguistics',
                                ),
                            5 =>
                                array (
                                    0 => 'Psycholinguistics',
                                ),
                            6 =>
                                array (
                                    0 => 'British Sign Language',
                                ),
                            7 =>
                                array (
                                    0 => 'Linguistics of non-English European Languages',
                                    1 => 'French Linguistics',
                                    2 => 'German Linguistics',
                                    3 => 'Italian Linguistics',
                                    4 => 'Spanish Linguistics',
                                    5 => 'Russian Linguistics',
                                    6 => 'Linguistics of Scandinavian Languages',
                                    7 => 'Linguistics of Slavonic and East-European Languages',
                                    8 => 'Linguistics of Ancient and Classical Languages',
                                ),
                            8 =>
                                array (
                                    0 => 'Linguistics of non-English, non-European Languages',
                                    1 => 'Chinese Linguistics',
                                    2 => 'Japanese Linguistics',
                                    3 => 'Linguistics of Other Asian Languages',
                                    4 => 'Linguistics of Middle-Eastern Languages',
                                    5 => 'Linguistics of African Languages',
                                ),
                            9 =>
                                array (
                                    0 => 'Linguistics not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Comparative literary studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Literature in translation',
                                ),
                            2 =>
                                array (
                                    0 => 'Literature in its original language',
                                ),
                            9 =>
                                array (
                                    0 => 'Comparative literary studies not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'English studies',
                                ),
                            1 =>
                                array (
                                    0 => 'English language',
                                ),
                            2 =>
                                array (
                                    0 => 'English literature',
                                    1 => 'English literature by period',
                                    2 => 'English literature by author',
                                    3 => 'English literature by topic',
                                ),
                            3 =>
                                array (
                                    0 => 'English as a second language',
                                ),
                            4 =>
                                array (
                                    0 => 'English literature written as a second language',
                                ),
                            5 =>
                                array (
                                    0 => 'Scots language',
                                ),
                            6 =>
                                array (
                                    0 => 'Scots literature',
                                ),
                            7 =>
                                array (
                                    0 => 'Irish language',
                                ),
                            8 =>
                                array (
                                    0 => 'Irish literature',
                                ),
                            9 =>
                                array (
                                    0 => 'English studies not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Ancient language studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Ancient Egyptian',
                                    1 => 'Coptic',
                                ),
                            2 =>
                                array (
                                    0 => 'Classical Arabic',
                                ),
                            3 =>
                                array (
                                    0 => 'Akkadian',
                                ),
                            4 =>
                                array (
                                    0 => 'Sumerian',
                                ),
                            5 =>
                                array (
                                    0 => 'Sanskrit',
                                ),
                            6 =>
                                array (
                                    0 => 'Prakrit',
                                ),
                            7 =>
                                array (
                                    0 => 'Aramaic',
                                ),
                            8 =>
                                array (
                                    0 => 'Hebrew',
                                ),
                            9 =>
                                array (
                                    0 => 'Ancient language studies not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Celtic studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Ancient Celtic studies',
                                ),
                            2 =>
                                array (
                                    0 => 'Modern Celtic studies',
                                    1 => 'Goidelic group of languages',
                                    2 => 'Brythonic group of languages',
                                ),
                            3 =>
                                array (
                                    0 => 'Scottish Gaelic',
                                    1 => 'Scottish Gaelic literature',
                                ),
                            4 =>
                                array (
                                    0 => 'Irish Gaelic',
                                    1 => 'Irish Gaelic literature',
                                ),
                            5 =>
                                array (
                                    0 => 'Manx',
                                    1 => 'Manx literature',
                                ),
                            6 =>
                                array (
                                    0 => 'Welsh',
                                    1 => 'Welsh literature',
                                ),
                            7 =>
                                array (
                                    0 => 'Cornish',
                                    1 => 'Cornish literature',
                                ),
                            8 =>
                                array (
                                    0 => 'Breton',
                                    1 => 'Breton literature',
                                ),
                            9 =>
                                array (
                                    0 => 'Celtic studies not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Latin studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Latin language',
                                    1 => 'Church Latin',
                                    2 => 'Medieval Latin',
                                ),
                            2 =>
                                array (
                                    0 => 'Latin literature',
                                ),
                            3 =>
                                array (
                                    0 => 'Latin literature in translation',
                                ),
                            9 =>
                                array (
                                    0 => 'Latin studies not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Classical Greek studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Classical Greek language',
                                    1 => 'Classical Church Greek',
                                    2 => 'Late Greek',
                                ),
                            2 =>
                                array (
                                    0 => 'Classical Greek literature',
                                ),
                            3 =>
                                array (
                                    0 => 'Classical Greek literature in translation',
                                ),
                            9 =>
                                array (
                                    0 => 'Classical Greek studies not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Classical studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Classical reception',
                                ),
                            9 =>
                                array (
                                    0 => 'Classical studies not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in linguistics, classics & related subjects',
                                ),
                            1 =>
                                array (
                                    0 => 'Translation studies',
                                ),
                            2 =>
                                array (
                                    0 => 'Translation theory',
                                ),
                            9 =>
                                array (
                                    0 => 'Linguistics, classics & related subjects not elsewhere classified',
                                ),
                        ),
                ),
            'R' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'European languages, literature and releated subjects',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'French studies',
                                ),
                            1 =>
                                array (
                                    0 => 'French language',
                                ),
                            2 =>
                                array (
                                    0 => 'French literature',
                                ),
                            3 =>
                                array (
                                    0 => 'French society & culture',
                                ),
                            9 =>
                                array (
                                    0 => 'French studies not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'German studies',
                                ),
                            1 =>
                                array (
                                    0 => 'German language',
                                ),
                            2 =>
                                array (
                                    0 => 'German literature',
                                ),
                            3 =>
                                array (
                                    0 => 'German society & culture',
                                ),
                            9 =>
                                array (
                                    0 => 'German studies not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Italian studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Italian language',
                                ),
                            2 =>
                                array (
                                    0 => 'Italian literature',
                                ),
                            3 =>
                                array (
                                    0 => 'Italian society & culture',
                                ),
                            9 =>
                                array (
                                    0 => 'Italian studies not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Spanish studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Spanish language',
                                    1 => 'Spanish languages in other countries',
                                ),
                            2 =>
                                array (
                                    0 => 'Spanish literature',
                                ),
                            3 =>
                                array (
                                    0 => 'Spanish society & culture',
                                ),
                            9 =>
                                array (
                                    0 => 'Spanish studies not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Portuguese studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Portuguese language',
                                    1 => 'Portuguese languages in other countries',
                                ),
                            2 =>
                                array (
                                    0 => 'Portuguese literature',
                                ),
                            3 =>
                                array (
                                    0 => 'Portuguese society & culture',
                                ),
                            9 =>
                                array (
                                    0 => 'Portuguese studies not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Scandinavian studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Scandinavian languages',
                                    1 => 'Swedish language',
                                    2 => 'Norwegian language',
                                    3 => 'Finnish language',
                                    4 => 'Danish language',
                                ),
                            2 =>
                                array (
                                    0 => 'Scandinavian literature',
                                    1 => 'Swedish literature',
                                    2 => 'Norwegian literature',
                                    3 => 'Finnish literature',
                                    4 => 'Danish literature',
                                ),
                            3 =>
                                array (
                                    0 => 'Scandinavian society & culture',
                                    1 => 'Swedish society & culture',
                                    2 => 'Norwegian society & culture',
                                    3 => 'Finnish society & culture',
                                    4 => 'Danish society & culture',
                                ),
                            9 =>
                                array (
                                    0 => 'Scandinavian studies not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Russian & East European studies',
                                    1 => 'Russian studies',
                                    2 => 'Czech studies',
                                    3 => 'Polish studies',
                                    4 => 'Belarusian studies',
                                    5 => 'Bulgarian studies',
                                    6 => 'Hungarian studies',
                                    7 => 'Romanian studies',
                                    8 => 'Slovak studies',
                                    9 => 'Ukrainian studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Russian & East European languages',
                                    1 => 'Russian language',
                                    2 => 'Polish language',
                                    3 => 'Czech language',
                                ),
                            2 =>
                                array (
                                    0 => 'Russian & east European Literature',
                                    1 => 'Russian literature',
                                    2 => 'Polish literature',
                                    3 => 'Czech literature',
                                ),
                            3 =>
                                array (
                                    0 => 'Russian & east European society & culture',
                                    1 => 'Russian society & culture',
                                    2 => 'Polish society & culture',
                                    3 => 'Czech society & culture',
                                ),
                            9 =>
                                array (
                                    0 => 'Russian & east European studies not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'European studies',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in European languages, literature & related subjects',
                                ),
                            1 =>
                                array (
                                    0 => 'Other European languages',
                                    1 => 'Dutch',
                                    2 => 'Flemish',
                                ),
                            2 =>
                                array (
                                    0 => 'Other European literature',
                                ),
                            3 =>
                                array (
                                    0 => 'Other European societies & cultures',
                                ),
                            9 =>
                                array (
                                    0 => 'European languages, literature & related subjects not elsewhere classified',
                                ),
                        ),
                ),
            'T' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Eastern, Asiatic, African, American and Australasian languages, literature and related subjects',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Chinese studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Chinese language studies',
                                ),
                            2 =>
                                array (
                                    0 => 'Chinese literature studies',
                                ),
                            3 =>
                                array (
                                    0 => 'Chinese society & culture studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Chinese studies not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Japanese studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Japanese language studies',
                                ),
                            2 =>
                                array (
                                    0 => 'Japanese literature studies',
                                ),
                            3 =>
                                array (
                                    0 => 'Japanese society & culture studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Japanese studies not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'South Asian studies',
                                ),
                            1 =>
                                array (
                                    0 => 'South Asian language studies',
                                    1 => 'Indian language studies',
                                    2 => 'Pakistani language studies',
                                    3 => 'Sri Lankan language studies',
                                    4 => 'Bangladeshi language studies',
                                    5 => 'Nepali language studies',
                                ),
                            2 =>
                                array (
                                    0 => 'South Asian literature studies',
                                    1 => 'Indian literature studies',
                                    2 => 'Pakistani literature studies',
                                    3 => 'Sri Lankan literature studies',
                                    4 => 'Bangladeshi literature studies',
                                    5 => 'Nepali literature studies',
                                ),
                            3 =>
                                array (
                                    0 => 'South Asian society & culture studies',
                                    1 => 'Indian society & culture studies',
                                    2 => 'Pakistani society & culture studies',
                                    3 => 'Sri Lankan society & culture studies',
                                    4 => 'Bangladeshi society & culture studies',
                                    5 => 'Nepali society & culture studies',
                                ),
                            9 =>
                                array (
                                    0 => 'South Asian studies not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Other Asian studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Other Asian language studies',
                                    1 => 'East Asian language studies',
                                    2 => 'South East Asian language studies',
                                ),
                            2 =>
                                array (
                                    0 => 'Other Asian literature studies',
                                    1 => 'East Asian literature studies',
                                    2 => 'South East Asian literature studies',
                                ),
                            3 =>
                                array (
                                    0 => 'Other Asian society & culture studies',
                                    1 => 'East Asian society & culture studies',
                                    2 => 'South East Asian society & culture studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Other Asian studies not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'African studies',
                                ),
                            1 =>
                                array (
                                    0 => 'African language studies',
                                    1 => 'Eastern African language studies',
                                    2 => 'Central African language studies',
                                    3 => 'Northern African language studies',
                                    4 => 'Southern African language studies',
                                    5 => 'Western African language studies',
                                ),
                            2 =>
                                array (
                                    0 => 'African literature studies',
                                    1 => 'Eastern African literature studies',
                                    2 => 'Central African literature studies',
                                    3 => 'Northern African literature studies',
                                    4 => 'Southern African literature studies',
                                    5 => 'Western African literature studies',
                                ),
                            3 =>
                                array (
                                    0 => 'African society & culture studies',
                                    1 => 'Eastern African society & culture studies',
                                    2 => 'Central African society & culture studies',
                                    3 => 'Northern African society & culture studies',
                                    4 => 'Southern African society & culture studies',
                                    5 => 'Western African society & culture studies',
                                ),
                            9 =>
                                array (
                                    0 => 'African studies not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Modern Middle Eastern studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Modern Middle Eastern language studies',
                                    1 => 'Arabic language studies',
                                    2 => 'Modern Standard Arabic language studies',
                                    3 => 'Persian language studies',
                                    4 => 'Modern Hebrew language studies',
                                    5 => 'Kurdish language studies',
                                    6 => 'Turkish language studies',
                                ),
                            2 =>
                                array (
                                    0 => 'Modern Middle Eastern literature studies',
                                    1 => 'Arabic literature studies',
                                    3 => 'Persian literature studies',
                                    4 => 'Modern Hebrew literature studies',
                                    5 => 'Kurdish literature studies',
                                    6 => 'Turkish literature studies',
                                ),
                            3 =>
                                array (
                                    0 => 'Modern Middle Eastern society & culture studies',
                                    1 => 'Arab society & culture studies',
                                    3 => 'Persian society & culture studies',
                                    4 => 'Modern Hebrew society & culture studies',
                                    5 => 'Kurdish society & culture studies',
                                    6 => 'Turkish society & culture studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Modern Middle Eastern studies not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'American studies',
                                ),
                            1 =>
                                array (
                                    0 => 'American language studies',
                                    1 => 'Latin American language studies',
                                    2 => 'United States language studies',
                                    3 => 'Canadian language studies',
                                    4 => 'Caribbean language studies',
                                ),
                            2 =>
                                array (
                                    0 => 'American literature studies',
                                    1 => 'Latin American literature studies',
                                    2 => 'United States literature studies',
                                    3 => 'Canadian literature studies',
                                    4 => 'Caribbean literature studies',
                                ),
                            3 =>
                                array (
                                    0 => 'American society & culture studies',
                                    1 => 'Latin American society & culture studies',
                                    2 => 'United States society & culture studies',
                                    3 => 'Canadian society & culture studies',
                                    4 => 'Caribbean society & culture studies',
                                ),
                            9 =>
                                array (
                                    0 => 'American studies not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Australasian studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Australasian language studies',
                                ),
                            2 =>
                                array (
                                    0 => 'Australasian literature studies',
                                ),
                            3 =>
                                array (
                                    0 => 'Australasian society & culture studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Australasian studies not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in Eastern, Asiatic, African, American & Australasian languages, literature & related subjects',
                                ),
                            1 =>
                                array (
                                    0 => 'Others in Eastern, Asiatic, African, American & Australasian languages',
                                ),
                            2 =>
                                array (
                                    0 => 'Others in Eastern, Asiatic, African, American & Australasian literature',
                                ),
                            3 =>
                                array (
                                    0 => 'Others in Eastern, Asiatic, African, American & Australasian societies & culture',
                                ),
                            9 =>
                                array (
                                    0 => 'Eastern, Asiatic, African, American & Australasian languages, literature',
                                ),
                        ),
                ),
            'V' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Historical and philosophical studies',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'History by period',
                                ),
                            1 =>
                                array (
                                    0 => 'Ancient History',
                                ),
                            2 =>
                                array (
                                    0 => 'Byzantine History',
                                ),
                            3 =>
                                array (
                                    0 => 'Medieval History',
                                ),
                            4 =>
                                array (
                                    0 => 'Modern history',
                                    1 => 'Modern history 1500-1599',
                                    2 => 'Modern history 1600-1699',
                                    3 => 'Modern history 1700-1799',
                                    4 => 'Modern history 1800-1899',
                                    5 => 'Modern history 1900-1919',
                                    6 => 'Modern history 1920-1949',
                                    7 => 'Modern history 1950-1999',
                                    8 => 'Modern history 2000-2099',
                                ),
                            5 =>
                                array (
                                    0 => 'Medieval history',
                                ),
                            6 =>
                                array (
                                    0 => 'Ancient history',
                                    1 => 'Late Antique history',
                                ),
                            9 =>
                                array (
                                    0 => 'History by period not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'History by area',
                                ),
                            1 =>
                                array (
                                    0 => 'British history',
                                    1 => 'Irish history',
                                    2 => 'Scottish history',
                                    3 => 'Welsh history',
                                    4 => 'English history',
                                ),
                            2 =>
                                array (
                                    0 => 'European history',
                                    1 => 'French history',
                                    2 => 'German history',
                                    3 => 'Italian history',
                                    4 => 'Iberian history',
                                    5 => 'Russian history',
                                ),
                            3 =>
                                array (
                                    0 => 'American history',
                                    1 => 'Canadian history',
                                    2 => 'USA history',
                                    3 => 'South American history',
                                    4 => 'Central American history',
                                ),
                            4 =>
                                array (
                                    0 => 'Asian history',
                                    1 => 'Chinese history',
                                    2 => 'Indian history',
                                    3 => 'South East Asian history',
                                    4 => 'Byzantine History',
                                ),
                            5 =>
                                array (
                                    0 => 'African history',
                                    1 => 'North African history',
                                    2 => 'Central African history',
                                    3 => 'Southern African history',
                                    4 => 'East African history',
                                    5 => 'West African history',
                                ),
                            6 =>
                                array (
                                    0 => 'Australasian history',
                                    1 => 'Australian history',
                                    2 => 'New Zealand history',
                                ),
                            7 =>
                                array (
                                    0 => 'World history',
                                    1 => 'International history',
                                ),
                            9 =>
                                array (
                                    0 => 'History by area not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'History by topic',
                                ),
                            1 =>
                                array (
                                    0 => 'Economic history',
                                ),
                            2 =>
                                array (
                                    0 => 'Social history',
                                    1 => 'Local history',
                                    2 => 'Oral history',
                                    3 => 'Family history',
                                    4 => 'Crime history',
                                ),
                            3 =>
                                array (
                                    0 => 'History of religions',
                                ),
                            4 =>
                                array (
                                    0 => 'Intellectual history',
                                ),
                            5 =>
                                array (
                                    0 => 'History of art',
                                ),
                            6 =>
                                array (
                                    0 => 'History of architecture',
                                ),
                            7 =>
                                array (
                                    0 => 'History of design',
                                ),
                            8 =>
                                array (
                                    0 => 'History of science',
                                    1 => 'History of physics',
                                    2 => 'History of chemistry',
                                    3 => 'History of mathematics',
                                    4 => 'History of medicine',
                                ),
                            9 =>
                                array (
                                    0 => 'History by topic not elsewhere classified',
                                    1 => 'Military history',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Archaeology',
                                ),
                            1 =>
                                array (
                                    0 => 'Egyptology',
                                ),
                            2 =>
                                array (
                                    0 => 'Stone Age',
                                ),
                            3 =>
                                array (
                                    0 => 'Bronze Age',
                                ),
                            4 =>
                                array (
                                    0 => 'Iron Age',
                                ),
                            5 =>
                                array (
                                    0 => 'Archaeological conservation',
                                ),
                            6 =>
                                array (
                                    0 => 'Archaeological techniques',
                                ),
                            7 =>
                                array (
                                    0 => 'Classical art & archaeology',
                                    1 => 'Roman art & archaeology',
                                    2 => 'Greek art & archaeology',
                                ),
                            9 =>
                                array (
                                    0 => 'Archaeology not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Philosophy',
                                ),
                            1 =>
                                array (
                                    0 => 'Metaphysics',
                                    1 => 'Epistemology',
                                ),
                            2 =>
                                array (
                                    0 => 'Moral philosophy',
                                ),
                            3 =>
                                array (
                                    0 => 'Scholastic philosophy',
                                ),
                            4 =>
                                array (
                                    0 => 'Social philosophy',
                                ),
                            5 =>
                                array (
                                    0 => 'Philosophy of science',
                                ),
                            6 =>
                                array (
                                    0 => 'Mental philosophy',
                                ),
                            9 =>
                                array (
                                    0 => 'Philosophy not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Theology & religious studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Theology',
                                ),
                            2 =>
                                array (
                                    0 => 'Religious studies',
                                    1 => 'Christian studies',
                                    2 => 'Islamic studies',
                                    3 => 'Judaism',
                                    4 => 'Hinduism',
                                    5 => 'Buddhism',
                                    6 => 'Other Asian religious studies',
                                    7 => 'Comparative religious studies',
                                ),
                            3 =>
                                array (
                                    0 => 'Divinity',
                                ),
                            4 =>
                                array (
                                    0 => 'Religious writings',
                                    1 => 'The Bible & Christian texts',
                                    2 => 'The Qur\'an & Islamic texts',
                                    3 => 'The Torah & Judaic texts',
                                    4 => 'Asian religious texts',
                                    5 => 'Comparative religious texts',
                                ),
                            5 =>
                                array (
                                    0 => 'Pastoral studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Theology & religious studies not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Heritage studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Heritage theory',
                                ),
                            2 =>
                                array (
                                    0 => 'Heritage site management',
                                ),
                            3 =>
                                array (
                                    0 => 'Natural heritage',
                                    1 => 'Coastal heritage management',
                                ),
                            4 =>
                                array (
                                    0 => 'Visitor management including interpretation',
                                ),
                            5 =>
                                array (
                                    0 => 'Oral history, heritage & genealogy',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in historical & philosophical studies',
                                ),
                            9 =>
                                array (
                                    0 => 'Historical & philosophical studies not elsewhere classified',
                                ),
                        ),
                ),
            'W' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Creative arts and design',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Fine art',
                                ),
                            1 =>
                                array (
                                    0 => 'Drawing',
                                ),
                            2 =>
                                array (
                                    0 => 'Painting',
                                ),
                            3 =>
                                array (
                                    0 => 'Sculpture',
                                ),
                            4 =>
                                array (
                                    0 => 'Printmaking',
                                ),
                            5 =>
                                array (
                                    0 => 'Calligraphy',
                                ),
                            6 =>
                                array (
                                    0 => 'Fine art conservation',
                                ),
                            9 =>
                                array (
                                    0 => 'Fine art not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Design studies',
                                ),
                            1 =>
                                array (
                                    0 => 'Graphic design',
                                    1 => 'Typography',
                                    2 => 'Multimedia design',
                                    3 => 'Visual communication',
                                ),
                            2 =>
                                array (
                                    0 => 'Illustration',
                                ),
                            3 =>
                                array (
                                    0 => 'Clothing/fashion design',
                                    1 => 'Textile design',
                                ),
                            4 =>
                                array (
                                    0 => 'Industrial/product design',
                                ),
                            5 =>
                                array (
                                    0 => 'Interior design',
                                ),
                            6 =>
                                array (
                                    0 => 'Furniture design',
                                ),
                            7 =>
                                array (
                                    0 => 'Ceramics design',
                                ),
                            8 =>
                                array (
                                    0 => 'Interactive & electronic design',
                                ),
                            9 =>
                                array (
                                    0 => 'Design studies not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Music',
                                ),
                            1 =>
                                array (
                                    0 => 'Musicianship/performance studies',
                                    1 => 'Instrumental or vocal performance',
                                    2 => 'Musical theatre',
                                    3 => 'Conducting',
                                    4 => 'Jazz performance',
                                    5 => 'Popular music performance',
                                    6 => 'Electronic/electro-acoustic music performance',
                                    7 => 'Historical performance practice',
                                ),
                            2 =>
                                array (
                                    0 => 'Music education/teaching',
                                ),
                            3 =>
                                array (
                                    0 => 'History of music',
                                ),
                            4 =>
                                array (
                                    0 => 'Types of music',
                                    1 => 'Popular music',
                                    2 => 'Film music/screen music',
                                    3 => 'Jazz',
                                    4 => 'Folk music',
                                    5 => 'Opera',
                                    6 => 'Sacred music',
                                ),
                            5 =>
                                array (
                                    0 => 'Musicology',
                                    1 => 'Ethnomusicology/world music',
                                    2 => 'Community music',
                                    3 => 'Music & gender',
                                    4 => 'Philosophy, aesthetics & criticism of music',
                                    5 => 'Music psychology',
                                    6 => 'Music theory & analysis',
                                    7 => 'Sociology of music',
                                ),
                            6 =>
                                array (
                                    0 => 'Musical instrument history',
                                ),
                            7 =>
                                array (
                                    0 => 'Music technology & industry',
                                    1 => 'Sound design/commercial music recording',
                                    2 => 'Creative music technology',
                                    3 => 'Electro-acoustic studies',
                                    4 => 'Music production',
                                    5 => 'Music management/music industry management/arts management',
                                    6 => 'Music marketing',
                                ),
                            8 =>
                                array (
                                    0 => 'Composition',
                                    1 => 'Electracoustic composition/acousmatic composition',
                                    2 => 'Sonic arts',
                                    3 => 'Electronic music',
                                    4 => 'Applied music/musicianship',
                                    5 => 'Commercial music composition',
                                    6 => 'Multimedia music composition',
                                    7 => 'Jazz composition',
                                    8 => 'Popular music composition',
                                ),
                            9 =>
                                array (
                                    0 => 'Music not elsewhere classified',
                                ),
                        ),
                    4 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Drama',
                                ),
                            1 =>
                                array (
                                    0 => 'Acting',
                                ),
                            2 =>
                                array (
                                    0 => 'Directing for theatre',
                                ),
                            3 =>
                                array (
                                    0 => 'Producing for theatre',
                                ),
                            4 =>
                                array (
                                    0 => 'Theatre studies',
                                    1 => 'Theatre & professional practice',
                                    2 => 'Contemporary theatre',
                                    3 => 'Technical arts & special effects for theatre',
                                ),
                            5 =>
                                array (
                                    0 => 'Stage management',
                                    1 => 'Theatrical wardrobe design',
                                    2 => 'Theatrical make-up',
                                    3 => 'Technical stage management',
                                ),
                            6 =>
                                array (
                                    0 => 'Theatre design',
                                    1 => 'Stage design',
                                ),
                            7 =>
                                array (
                                    0 => 'Performance & live arts',
                                    1 => 'European/world theatre arts',
                                    2 => 'Circus arts',
                                    3 => 'Community theatre',
                                ),
                            9 =>
                                array (
                                    0 => 'Drama not elsewhere classified',
                                ),
                        ),
                    5 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Dance',
                                ),
                            1 =>
                                array (
                                    0 => 'Choreography',
                                ),
                            2 =>
                                array (
                                    0 => 'Body awareness',
                                ),
                            3 =>
                                array (
                                    0 => 'History of dance',
                                    1 => 'Dance & culture',
                                    2 => 'Community dance',
                                ),
                            4 =>
                                array (
                                    0 => 'Types of dance',
                                    1 => 'Ballet',
                                    2 => 'Dance theatre',
                                    3 => 'Contemporary dance',
                                    4 => 'Jazz dance',
                                ),
                            5 =>
                                array (
                                    0 => 'Dance performance',
                                ),
                            9 =>
                                array (
                                    0 => 'Dance not elsewhere classified',
                                ),
                        ),
                    6 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Cinematics & photography',
                                ),
                            1 =>
                                array (
                                    0 => 'Moving image techniques',
                                    1 => 'Directing motion pictures',
                                    2 => 'Producing motion pictures',
                                    3 => 'Film & sound recording',
                                    4 => 'Visual & audio effects',
                                    5 => 'Animation techniques',
                                ),
                            2 =>
                                array (
                                    0 => 'Cinematography',
                                ),
                            3 =>
                                array (
                                    0 => 'History of cinematics & photography',
                                    1 => 'History of cinematics',
                                    2 => 'History of photography',
                                ),
                            4 =>
                                array (
                                    0 => 'Photography',
                                ),
                            9 =>
                                array (
                                    0 => 'Cinematics & photography not elsewhere classified',
                                ),
                        ),
                    7 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Crafts',
                                ),
                            1 =>
                                array (
                                    0 => 'Fabric & leather crafts',
                                    1 => 'Needlecraft',
                                    2 => 'Dressmaking',
                                    3 => 'Soft furnishing',
                                    4 => 'Weaving',
                                    5 => 'Leatherwork',
                                ),
                            2 =>
                                array (
                                    0 => 'Metal crafts',
                                    1 => 'Silversmithing/goldsmithing',
                                    2 => 'Blacksmithing',
                                    3 => 'Clock/watchmaking',
                                ),
                            3 =>
                                array (
                                    0 => 'Wood crafts',
                                    1 => 'Carpentry/joinery',
                                    2 => 'Cabinet making',
                                    3 => 'Marquetry & inlaying',
                                    4 => 'Veneering',
                                ),
                            4 =>
                                array (
                                    0 => 'Surface decoration',
                                ),
                            5 =>
                                array (
                                    0 => 'Clay & stone crafts',
                                    1 => 'Pottery',
                                    2 => 'Tile making',
                                    3 => 'Stone crafts',
                                ),
                            6 =>
                                array (
                                    0 => 'Reed crafts',
                                    1 => 'Basketry',
                                    2 => 'Thatching',
                                ),
                            7 =>
                                array (
                                    0 => 'Glass crafts',
                                    1 => 'Glassblowing',
                                ),
                            8 =>
                                array (
                                    0 => 'Paper crafts',
                                    1 => 'Bookbinding',
                                    2 => 'Origami',
                                ),
                            9 =>
                                array (
                                    0 => 'Crafts not elsewhere classified',
                                ),
                        ),
                    8 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Imaginative writing',
                                ),
                            1 =>
                                array (
                                    0 => 'Scriptwriting',
                                ),
                            2 =>
                                array (
                                    0 => 'Poetry writing',
                                ),
                            3 =>
                                array (
                                    0 => 'Prose writing',
                                ),
                            9 =>
                                array (
                                    0 => 'Imaginative writing not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in creative arts & design',
                                ),
                            9 =>
                                array (
                                    0 => 'Creative arts & design not elsewhere classified',
                                ),
                        ),
                ),
            'X' =>
                array (
                    0 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Education',
                                ),
                        ),
                    1 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Training teachers',
                                ),
                            1 =>
                                array (
                                    0 => 'Training teachers - nursery',
                                ),
                            2 =>
                                array (
                                    0 => 'Training teachers - primary',
                                    1 => 'Training teachers - infant (key stage 1)',
                                    2 => 'Training teachers - junior (key stage 2)',
                                ),
                            3 =>
                                array (
                                    0 => 'Training teachers - secondary',
                                    1 => 'Training teachers - key stage 3',
                                    2 => 'Training teachers - key stage 4',
                                ),
                            4 =>
                                array (
                                    0 => 'Training teachers - tertiary',
                                    1 => 'Training teachers - further education',
                                    2 => 'Training teachers - higher education',
                                ),
                            5 =>
                                array (
                                    0 => 'Training teachers - adult education',
                                    1 => 'Training teachers - coaching',
                                ),
                            6 =>
                                array (
                                    0 => 'Training teachers - specialist',
                                    1 => 'Training teachers - special needs',
                                    2 => 'Teaching English as a Foreign Language (TEFL)',
                                ),
                            9 =>
                                array (
                                    0 => 'Training teachers not elsewhere classified',
                                ),
                        ),
                    2 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Research & study skills in education',
                                ),
                            1 =>
                                array (
                                    0 => 'Research skills',
                                ),
                            2 =>
                                array (
                                    0 => 'Study skills',
                                ),
                            9 =>
                                array (
                                    0 => 'Research & study skills in education not elsewhere classified',
                                ),
                        ),
                    3 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Academic studies in education',
                                ),
                            1 =>
                                array (
                                    0 => 'Academic studies in nursery education',
                                ),
                            2 =>
                                array (
                                    0 => 'Academic studies in primary education',
                                ),
                            3 =>
                                array (
                                    0 => 'Academic studies in secondary education',
                                ),
                            4 =>
                                array (
                                    0 => 'Academic studies in tertiary education',
                                    1 => 'Academic studies in further education',
                                    2 => 'Academic studies in higher education',
                                ),
                            5 =>
                                array (
                                    0 => 'Academic studies in adult education',
                                ),
                            6 =>
                                array (
                                    0 => 'Academic studies in specialist education',
                                ),
                            7 =>
                                array (
                                    0 => 'Academic studies in education (across phases)',
                                ),
                            9 =>
                                array (
                                    0 => 'Academic studies in education not elsewhere classified',
                                ),
                        ),
                    9 =>
                        array (
                            0 =>
                                array (
                                    0 => 'Others in education',
                                ),
                            9 =>
                                array (
                                    0 => 'Education not elsewhere classified',
                                ),
                        ),
                ),
        ), Jacs::getMatrixTree());
    }
}

