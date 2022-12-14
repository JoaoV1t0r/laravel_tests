pipeline{
    agent any
    stages{
        stage('Build'){
            environment {
                DB_HOST = "192.168.15.137"
                DB_DATABASE = "mysql"
                DB_USERNAME = "vitor"
                DB_PASSWORD = "12345"
            }
            steps{
                echo 'Building the project'
                script{
                    sh 'cp .env.example .env'
                    sh 'echo DB_HOST=${DB_HOST} >> .env'
                    sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                    sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                    sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                    sh 'cp .env .env.testing'
                    dockerapp = docker.build("joaov1t0r/laravel_tests:${env.BUILD_ID}", '-f ./docker/Dockerfile .')
                }
            }
        }
        stage('push image'){
            steps{
                script{
                     docker.withRegistry('https://registry.hub.docker.com', 'dockerhub') {
                        dockerapp.push('latest')
                        dockerapp.push("${env.BUILD_ID}")
                    }
                }
            }
        }
        stage('Deploy'){
            steps{
                echo 'Deploying the project'
                script{
                    docker.image("joaov1t0r/laravel_tests:${env.BUILD_ID}").withRun('-p 8000:80'){
                        sh 'php artisan config:clear'
                    }
                }
            }
        }
    }
}