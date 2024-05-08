<?php

class Employee {
    private $name;
    private $department;
    private $salary;

    // การนิยาม 
    function __construct($name, $department, $salary) {
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    public function setDepartment($department) {
        $this->department = $department;
    }
    public function setSalary($salary) {
        $this->salary = $salary;
    }
    public function showData() {
        echo "ชื่อพนักงาน: ".$this->name."<br/>";
        echo "แผนก: " . $this->department."<br/>";
        echo "เงินเดือน: " . $this->salary."<br/>";
        echo "<hr>";
    }
} 

?>