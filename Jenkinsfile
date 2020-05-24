pipeline {
  agent any
  stages{
    stage('Build') {
      steps {
        sh 'ant'
      }
    }
	stage('Test') {
      steps {
        PATH=/home/sriharsha/Desktop/8th_sem/SPE/project:$PATH selenium-side-runner Test1.side Test2.side -c "browserName=chrome goog:chromeOptions.args=[headless]" --output-directory=results --output-format=junit
      }
    }
  }
}
