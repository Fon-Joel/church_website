pipeline {

       agent any

       stages {

              stage('Build') {

                     steps {

                            echo 'Running build automation'

                             sh './gradlew build --no-daemon'

                             archiveArtifacts artifacts: 'church_website/CGC.zip'

      }
              stage('build2') {
                    steps {
                           echo 'Running the next automation'
                           sh '.gradlew build2 --no-daemon'
                    }

}



}



}
