<?php
session_start();

include 'config.php';

if(isset($_POST['submit']))
{
    $cid = $_SESSION['CID'];
    $id = $_SESSION['id'];

    if(!empty($_POST['quizcheck'])){

        $score = 0;

        $count = count($_POST['quizcheck']);

        $i = 1;

        $selected = $_POST['quizcheck'];

        $stmt = $conn->prepare("select * from quiz where Course_Id={$id}");
        $stmt->execute();
        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()) {

            $checked = $row['Correct'] == $selected[$i];
            
            if($checked){
                $score++;
            }

            $i++;

        }
        $stmt->close();
        $percent = (100*$score)/$i;
        if($percent >= 50)
        {
            $passed = "Pass";
        }
        else{
            $passed = "Fail";
        }
    }else
    { 
        $score=0;
        $passed = "Fail";
    } 

        $stmt1 = $conn->prepare("update test_details set Score = ?,Result = ? where CID=?");
        $stmt1->bind_param('iss',$score,$passed,$cid);
        $stmt1->execute();

        $stmt2 = $conn->prepare("select * from test_details where CID=?");
        $stmt2->bind_param('s',$cid);
        if($stmt2)
            {
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $row2 = $result2->fetch_assoc();
            $stmt3 = $conn->prepare("select * from book where id=?");
            $stmt3->bind_param('i',$row2['Course_Id']);
            $stmt3->execute();
            $result3 = $stmt3->get_result();
            $row3 = $result3->fetch_assoc();
            $_SESSION['name'] = $row2['Name'];
            $_SESSION['bookname'] = $row3['Book_Name'];
            $_SESSION['score'] = $row2['Score'];
            $_SESSION['result'] = $row2['Result'];
            $_SESSION['message'] = "";
            $stmt3->close();
            $stmt2->close();
            }
                $stmt1->close();

            }
elseif(isset($_POST['showcert']))
{
    $cid = $_POST['cid'];
    $stmt = $conn->prepare("select * from test_details where CID=?");
    $stmt->bind_param('s',$cid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if($row['Course_Id'])
    {
    $stmt1 = $conn->prepare("select * from book where id=?");
    $stmt1->bind_param('i',$row['Course_Id']);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $row1 = $result1->fetch_assoc();
    $_SESSION['name'] = $row['Name'];
    $_SESSION['bookname'] = $row1['Book_Name'];
    $_SESSION['score'] = $row['Score'];
    $_SESSION['CID'] = $row['CID'];
    $_SESSION['result'] = $row['Result'];
    $_SESSION['message'] = "";
    $stmt1->close();
    $stmt->close();
    }
    else{
        $msg = "Enter Valid CID";
        $_SESSION['message'] = $msg;
        $_SESSION['name'] = "";
        $_SESSION['bookname'] = "";
        $_SESSION['score'] = "";
        $_SESSION['CID'] = "";
        $_SESSION['result'] = "";
    }
}
header('Location: score.php');
              
$conn->close();
?>