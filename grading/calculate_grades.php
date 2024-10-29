<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $student_name = $_POST['student_name'];
    $homework_scores = [
        $_POST['homework1'],
        $_POST['homework2'],
        $_POST['homework3'],
        $_POST['homework4'],
        $_POST['homework5']
    ];
    $quiz_scores = [
        $_POST['quiz1'],
        $_POST['quiz2'],
        $_POST['quiz3'],
        $_POST['quiz4'],
        $_POST['quiz5']
    ];
    $midterm_score = $_POST['midterm'];
    $final_project_score = $_POST['finalProject'];

    $homework_average = array_sum($homework_scores) / count($homework_scores);
    $homework_weighted = $homework_average * 0.2;

    // Quizzes Average, dropping the lowest score
    $lowest_quiz = min($quiz_scores);
    $quiz_scores = array_diff($quiz_scores, [$lowest_quiz]); 
    $quiz_average = array_sum($quiz_scores) / count($quiz_scores);
    $quiz_weighted = $quiz_average * 0.1;

    // Midterm, Final Project
    $midterm_weighted = $midterm_score * 0.3;
    $final_project_weighted = $final_project_score * 0.4;

    // Final Grade
    $final_grade = $homework_weighted + $quiz_weighted + $midterm_weighted + $final_project_weighted;
    $final_grade_rounded = round($final_grade);

    echo '<style>
            table {
                width: 50%;
                margin: 20px auto;
                border-collapse: collapse;
                border: 1px solid pink;
            }
            th, td {
                padding: 10px;
                text-align: center;
                border: 1px solid pink;
            }
            th {
                background-color: pink;
            }
            tr:nth-child(even) {
                background-color: #ffe6f2; 
            }
          </style>';

    echo '<table>';
    echo '<tr><th>Student Name</th><th>Final Grade</th></tr>';
    echo '<tr><td>' . htmlspecialchars($student_name) . '</td><td>' . htmlspecialchars($final_grade_rounded) . '</td></tr>';
    echo '</table>';
} else {
    echo "No data received!";
}
?>
