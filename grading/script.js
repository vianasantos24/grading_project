document.getElementById('gradeForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const homeworkScores = [
        parseFloat(this.homework1.value),
        parseFloat(this.homework2.value),
        parseFloat(this.homework3.value),
        parseFloat(this.homework4.value),
        parseFloat(this.homework5.value)
    ];

    const quizScores = [
        parseFloat(this.quiz1.value),
        parseFloat(this.quiz2.value),
        parseFloat(this.quiz3.value),
        parseFloat(this.quiz4.value),
        parseFloat(this.quiz5.value)
    ];

    const midtermScore = parseFloat(this.midterm.value);
    const finalProjectScore = parseFloat(this.finalProject.value);

    // Homework average
    const homeworkAverage = homeworkScores.reduce((a, b) => a + b, 0) / homeworkScores.length;

    // Drop the lowest quiz score
    const lowestQuizScore = Math.min(...quizScores);
    const filteredQuizScores = quizScores.filter(score => score !== lowestQuizScore);
    const quizAverage = filteredQuizScores.reduce((a, b) => a + b, 0) / filteredQuizScores.length;

    // Final grade
    const finalGrade = Math.round(
        (homeworkAverage * 0.2) + 
        (quizAverage * 0.1) + 
        (midtermScore * 0.3) + 
        (finalProjectScore * 0.4)
    );

    document.getElementById('finalGradeDisplay').textContent = finalGrade;

    document.getElementById('finalGradeInput').value = finalGrade;

    this.submit();
});


