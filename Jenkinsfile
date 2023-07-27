pipeline {

       agent any

       stages {

              stage('Build') {

                     steps {

                            echo 'Running build automation'

                             sh './gradlew build --no-daemon'
                             sh './gradlew build2 --no-daemon'

                             archiveArtifacts artifacts: 'church_website/website1.zip'

      }
             

}



}



}
