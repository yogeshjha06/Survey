pipeline {
    agent any
    environment {
        AWS_DEFAULT_REGION = 'us-east-1'
        KEY_NAME = 'your-key-name'
        STACK_NAME = 'SurveyWebsiteStack'
    }
    stages {
        stage('Checkout') {
            steps {
                git url: 'https://github.com/yogeshjha06/Survey.git', branch: 'main'
            }
        }
        stage('Deploy via CloudFormation') {
            steps {
                script {
                    sh """
                        aws cloudformation deploy \\
                        --stack-name ${STACK_NAME} \\
                        --template-file cloudformation.yml \\
                        --parameter-overrides KeyName=${KEY_NAME} InstanceType=t2.micro SSHLocation=0.0.0.0/0 \\
                        --capabilities CAPABILITY_IAM
                    """
                }
            }
        }
    }
    post {
        success {
            echo 'Deployment completed successfully.'
        }
        failure {
            echo 'Deployment failed. Please check the logs for details.'
        }
    }
}
