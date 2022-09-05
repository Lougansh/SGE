#!/bin/bash
sudo sed -i.bkp 's|#SERVER=server|SERVER=192.168.1.10|i' /etc/default/epoptes-client
sudo epoptes-client -c
sudo reboot