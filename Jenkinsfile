pipeline{
    agent any
    stages{
        stage('Build'){
            environment {
                DB_CONNECTION = "mysql"
                DB_HOST = "191.101.235.18"
                DB_DATABASE = "laravel_tests"
                DB_USERNAME = "vitor"
                DB_PASSWORD = 'O3gz3222xm&AjgLg4j$z&Wn'
            }
            steps{
                echo 'Building the project.'
                script{
                    sh 'cp .env.example .env'
                    sh 'echo DB_CONNECTION=${DB_CONNECTION} >> .env'
                    sh 'echo DB_HOST=${DB_HOST} >> .env'
                    sh 'echo DB_USERNAME=${DB_USERNAME} >> .env'
                    sh 'echo DB_DATABASE=${DB_DATABASE} >> .env'
                    sh 'echo DB_PASSWORD=${DB_PASSWORD} >> .env'
                    sh 'cp .env .env.testing'
                    dockerapp = docker.build("joaov1t0r/laravel_tests:${env.BUILD_ID}", '-f ./docker/Dockerfile .')
                }
            }
        }
        stage('Run Tests'){
            steps{
                echo 'Running the tests'
                script{
                    sh "docker run -d --name laravel_tests_run_test_${env.BUILD_ID} joaov1t0r/laravel_tests:${env.BUILD_ID}"
                    sh "docker exec laravel_tests_run_test_${env.BUILD_ID} php artisan optimize"
                    sh "docker exec laravel_tests_run_test_${env.BUILD_ID} php artisan optimize --env=testing"
                    sh "docker exec laravel_tests_run_test_${env.BUILD_ID} php artisan migrate"
                    sh "docker exec laravel_tests_run_test_${env.BUILD_ID} php artisan db:seed"
                    sh "docker exec laravel_tests_run_test_${env.BUILD_ID} mkdir ./tests/Unit"
                    sh "docker exec laravel_tests_run_test_${env.BUILD_ID} php artisan test"
                    sh "docker stop laravel_tests_run_test_${env.BUILD_ID} > /dev/null 2>&1 || true"
                    sh 'docker container prune -f > /dev/null 2>&1 || true'
                    // docker.runAfter(image: "joaov1t0r/laravel_tests:${env.BUILD_ID}", args: "-p 8000:80 -d") {
                    //     sh "mkdir ./tests/Unit"
                    //     sh "php artisan test"
                    // }
                //     dockerapp.inside{
                //         sh "mkdir ./tests/Unit"
                //         sh "php artisan test"
                //     }
                }
            }
        }
        // stage('Push Image'){
        //     steps{
        //         script{
        //              docker.withRegistry('https://registry.hub.docker.com', 'dockerhub') {
        //                 dockerapp.push('latest')
        //                 dockerapp.push("${env.BUILD_ID}")
        //             }
        //         }
        //     }
        // }
        stage('Deploy'){
            steps{
                echo 'Deploying the project'
                script{
                    sh "docker stop laravel_tests > /dev/null 2>&1 || true"
                    sh 'docker container prune -f > /dev/null 2>&1 || true'
                    sh "docker run -d -p 8000:80 --name laravel_tests joaov1t0r/laravel_tests:${env.BUILD_ID}"
                }
            }
        }
    }
    post{
        always{
            mail( 
                to: "joaovitor.silva2pereira@gmail.com",
                subject: "jenkins build:${currentBuild.currentResult}: ${env.JOB_NAME}",
                body: "${currentBuild.currentResult}: Job ${env.JOB_NAME}\nMore Info can be found here: ${env.BUILD_URL}"
            )
        }
    }
}