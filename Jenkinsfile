pipeline{
    agent any
    stages{
        stage('Build'){
            steps{
                echo 'Building the project'
                script{
                    dockerapp = docker.build("dockerapp:latest", '-f ./Docker/Dockerfile .')
                }
            }
        }
        stage('Test'){
            steps{
                echo 'Testing the project'
            }
        }
        stage('Deploy'){
            steps{
                echo 'Deploying the project'
            }
        }
    }
}