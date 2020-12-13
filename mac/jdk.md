about install jdk on mac: you'll see
```shell script
#install 
brew update
brew tap adoptopenjdk/openjdk
brew tap homebrew/cask-versions
brew install java

# and you'll see

For the system Java wrappers to find this JDK, symlink it with
  sudo ln -sfn /usr/local/opt/openjdk/libexec/openjdk.jdk /Library/Java/JavaVirtualMachines/openjdk.jdk

openjdk is keg-only, which means it was not symlinked into /usr/local,
because it shadows the macOS `java` wrapper.

If you need to have openjdk first in your PATH run:
  echo 'export PATH="/usr/local/opt/openjdk/bin:$PATH"' >> ~/.zshrc

For compilers to find openjdk you may need to set:
  export CPPFLAGS="-I/usr/local/opt/openjdk/include"
```
final solution:
```shell script
# add this line to .zshrc
export JAVA_HOME=/usr/libexec/java_home
```


 curl -XPUT -u elastic ‘http://localhost:9200/_xpack/license’ -H “Content-Type: application/json” -d @license.json
 
 curl -XPUT -u elastic 'http://localhost:9200/_xpack/license' -H "Content-Type: application/json" -d @license.json 