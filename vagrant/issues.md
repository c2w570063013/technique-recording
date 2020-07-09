### VirtualBox installation failed on macOS Catalina
I've moved from an old machine running macOS Mojave to a new machine using macOS Catalina using Migration Assistant. This bypassed the normal installation process, so the Security & Privacy System Preference never displayed a prompt that would allow me to grant VirtualBox permission to run. 

The solution was to download the latest, Catalina-compatable VirtualBox installer .dmg(version 6.12 and up) and run VirtualBox_Uninstall.tool. This failed, but prompted for extra permissions in System Preferences... Security & Privacy. After I granted permission to the uninstall tool, I ran the Uninstall tool again successfully.I then ran the VirutalBox install .pkg, which will failed. VirtualBox did install, just not completely. I then launched VirtualBox, which failed, but gave me a prompt in System Preferences... Security & Privacy that will allowed me to grant permission for VirtualBox to run. I then launched VirtualBox again, and was good to go.

### "vagrant up" error
There was an error while executing `VBoxManage`, a CLI used by Vagrant
for controlling VirtualBox. The command and stderr is shown below.

Command: ["hostonlyif", "create"]

Stderr: 0%...
Progress state: NS_ERROR_FAILURE
VBoxManage: error: Failed to create the host-only adapter
VBoxManage: error: VBoxNetAdpCtl: Error while adding new interface: failed to open /dev/vboxnetctl: No such file or directory
VBoxManage: error: Details: code NS_ERROR_FAILURE (0x80004005), component HostNetworkInterfaceWrap, interface IHostNetworkInterface
VBoxManage: error: Context: "RTEXITCODE handleCreate(HandlerArg *)" at line 94 of file VBoxManageHostonly.cpp

>FIX:
```shell script
sudo "/Library/Application Support/VirtualBox/LaunchDaemons/VirtualBoxStartup.sh" restart
```
And then 'allow' on 'security & privacy'