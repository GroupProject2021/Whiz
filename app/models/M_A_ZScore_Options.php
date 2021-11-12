<?php

class M_A_ZScore_Options {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCourseAndUniversities() {
        $this->db->query("SELECT * FROM v_gov_course_and_university ORDER BY unicode");
        $results = $this->db->resultSet();

        return $results;
    }

    public function getZScoreTableHeader() {
        $this->db->query('SELECT gov_course_name, uni_name, unicode FROM	v_zscore_table GROUP BY unicode;');
        $results = $this->db->resultSet();

        return $results;
    }

    public function getZScoreTable() {
        $this->db->query("SELECT * FROM v_zscore_table");        
        $results = $this->db->resultSet();

        return $results;
    }

    public function addZScoreEntry($data) {
        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(1, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d1']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(2, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d2']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(3, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d3']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(5, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d4']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(4, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d5']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(6, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d6']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(7, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d7']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(8, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d8']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(9, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d9']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(10, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d10']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(14, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d11']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(11, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d12']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(13, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d13']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(12, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d14']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(17, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d15']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(15, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d16']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(16, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d17']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(19, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d18']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(18, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d19']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(20, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d20']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(21, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d21']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(22, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d22']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(23, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d23']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(25, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d24']);
        $this->db->execute();

        $this->db->query('INSERT INTO ZScoreTable(district_id, unicode, syllabus, year, z_score) VALUES(24, :unicode, :syllabus, :year, :z_score)');
        // bind values
        $this->db->bind(":unicode", $data['course_of_study']);            
        $this->db->bind(":syllabus", $data['syllabus']);
        $this->db->bind(":year", $data['year']);
        $this->db->bind(":z_score", $data['d25']);
        $this->db->execute();

        return true;
    }
}

?>