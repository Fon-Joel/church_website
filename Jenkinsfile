pipeline {

       agent any

       stages {

              stage('Build') {

                     steps {

                            echo 'Running build automation'

                             sh './gradlew build --no-daemon'

                             archiveArtifacts artifacts: 'church_website/website1.zip'

      }
              stage('build2) {
                    ste[s {
                           echo 'Running the next automation'
                           sh '.gradlew build2 --no-daemon'
                    }

}



}



}
