<?php

class Search_Model extends Model {

    private $location;

    function __construct() {
        parent::__construct();
    }

    public function resultList() {
        if (isset($_POST['location'])) {
            $this->location = $_POST['location'];
        } else {
            echo 'location not set';
            $this->location = '';
        }
        if (isset($_POST['scheme_category'])) {
            $this->scheme_category = $_POST['scheme_category'];
        } else {
            echo "scheme category not set";
            $this->scheme_category = '';
        }

//        $sth = $this->db->prepare('select vehicle_reg_no,vehicle_type,manufacturer,model,capacity,vehicle_description,isActive,s.scheme_id,ac_availability,price,pricing_category,descrption,file from vehicle_scheme_location natural join location natural join scheme s natural join vehicle v natural join vehicle_image vi where location = :location');
        $sth = $this->db->prepare('drop view if exists results');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();

        if ($this->location) {
            $sth = $this->db->prepare('create view results as select vehicle_reg_no,o.owner_id,vehicle_type,manufacturer,model,capacity,vehicle_description,isActive,s.scheme_id,ac_price,non_ac_price,pricing_category,descrption,image from scheme_location natural join scheme s natural join vehicle v natural join owner o where location = :location and s.category = :scheme_category');
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute(array(
                ':location' => $this->location,
                ':scheme_category' => $this->scheme_category
            ));
        } else {
            $sth = $this->db->prepare('create view results as select distinct vehicle_reg_no,o.owner_id,vehicle_type,manufacturer,model,capacity,vehicle_description,isActive,s.scheme_id,ac_price,non_ac_price,pricing_category,descrption,image from scheme_location natural join scheme s natural join vehicle v natural join owner o where s.category = :scheme_category');
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute(array(
                ':scheme_category' => $this->scheme_category
            ));
        }

        $sth = $this->db->prepare('select * from results');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();

        $results = $sth->fetchAll();
//        print_r($results);

        foreach ($results as $key => $value) {
            $sth = $this->db->prepare('select telephone_number from telephone_number natural join (select owner_id,vehicle_reg_no from results) results WHERE vehicle_reg_no = :reg_no');
            $sth->setFetchMode(PDO::FETCH_ASSOC);

            $sth->execute(array(
                ':reg_no' => $value['vehicle_reg_no']
            ));
            $phnnumbers = $sth->fetchAll();
            $numbers = array();
            foreach ($phnnumbers as $idx => $pair) {
                $numbers[] = $pair['telephone_number'];
            }
//            $unqnumbers = array_unique($numbers);

            $results[$key]['phone_numbers'] = $numbers;

            $sth = $this->db->prepare('select comment,comment_date,username from comment natural join (select vehicle_reg_no from results) results where vehicle_reg_no= :reg_no');
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute(array(
                ':reg_no' => $value['vehicle_reg_no']
            ));
            $comments = $sth->fetchAll();
//            echo '<br><br> comments for'.$value['vehicle_reg_no'].' are'.print_r($comments);

            $results[$key]['comments'] = $comments;

            $sth = $this->db->prepare('select day,start_time,end_time from scheme natural join availability where scheme_id = :scheme_id');
            $sth->setFetchMode(PDO::FETCH_ASSOC);
//            error_log($value['scheme_id'], 0);
            $sth->execute(array(
                ':scheme_id' => $value['scheme_id']
            ));
            $availability = $sth->fetchAll();

            $results[$key]['availability'] = $availability;
        }
        return $results;
    }

    public function addComment($regno, $username, $comment) {
//        echo 'int he model';
        $sth = $this->db->prepare('INSERT INTO comment (vehicle_reg_no, comment, comment_date, username) VALUES (:reg_no, :comment , CURDATE(), :username)');
        return $sth->execute(array(
            ':reg_no' => $regno,
            ':comment' => $comment,
            ':username' => $username
        ));
    }

    public function initSession() {
        Session::init();
        Session::set('privilege', $this->privilege);
        Session::set('loggedIn', true);
    }

}
