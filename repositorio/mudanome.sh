#!/bin/bash
read host
sudo -S sh -c "echo \"\$host\" > /etc/hostname" <<< 'aluno123'
